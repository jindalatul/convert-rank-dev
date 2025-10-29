<?php
require_once dirname(dirname(__DIR__)) . '/common/config.php';
require_once dirname( dirname(dirname(__DIR__) ) ). '/db/connection.php';

$envPath = get_env_path() . '/env.php'; //echo "envPath",$envPath ; 

if (!file_exists($envPath)) { die('Env file missing'); }
$credentials = require $envPath;

//var_dump($credentials["GEMINI_KEY"]); //die();
//var_dump($credentials["DB"]); die();

$mysqli = getDbConnection($credentials["DB"]);

if (!$mysqli) {
  http_response_code(500);
  header('Content-Type: application/json');
  echo json_encode(['ok'=>false,'error'=>'DB_CONNECTION_FAILED','message'=>mysqli_connect_error()]);
  exit;
}

mysqli_set_charset($mysqli, 'utf8mb4');

/**
 * FLAGS
 * =====
 * USE_LLM:           true => use Gemini for crafted hints/chips after bank Q1 (and optionally bank Q2)
 * USE_JWT:           true => conversation key from Authorization: Bearer <JWT> (sub/sid). false => IP+UA fingerprint
 * SECOND_FROM_BANK:  true => Q2 also from bank; Gemini starts at Q3 for richer context
 */


$USE_LLM = false;
$USE_JWT = false;
$SECOND_FROM_BANK = true;

// ===== Basic API setup =====
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: POST, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;
header('Content-Type: application/json');

// ===== Gemini config (only used if USE_LLM = true) =====
$GEMINI_API_KEY = $credentials["GEMINI_KEY"] ?: '';
$GEMINI_MODEL   = 'gemini-2.5-flash';
$G_TIMEOUT_SEC  = 20;

// ===== Ordered keys => fixed progression, no loops =====
$QA_ORDER = ['industry','ideal_audience','primary_goal','authority_topics','buyer_language','seed_keywords'];

// ===== Question bank (templates/fallbacks) =====
$QA_TEMPLATES = [
  'industry' => [
    'key'=>'industry','q'=>'Which industry do you mainly serve or what service do you offer?',
    'hint'=>'Short and specific is best. Example: "roofing contractor", "speech therapy clinic".',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>[]
  ],
  'ideal_audience' => [
    'key'=>'ideal_audience','q'=>'Who do you most want to serve right now?',
    'hint'=>'Name the segment that best matches your work. Example: "homeowners with leaks", "parents of toddlers".',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  'primary_goal' => [
    'key'=>'primary_goal','q'=>'What is your main goal for the next 3–6 months?',
    'hint'=>'1 clear outcome. Example: "book 20 evals/month", "rank top 3 for local searches".',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>[]
  ],
  'authority_topics' => [
    'key'=>'authority_topics','q'=>'Which topics or services do you want to be known for?',
    'hint'=>'Pick 1–3 short areas. Example: "metal roof repair", "stuttering therapy".',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  'buyer_language' => [
    'key'=>'buyer_language','q'=>'Which phrases do prospects use before contacting you?',
    'hint'=>'Short real phrases. Example: "roof leak fix", "help my child stutters".',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  'seed_keywords' => [
    'key'=>'seed_keywords','q'=>'Pick 2–4 short seed topics (2–3 words).',
    'hint'=>'If relevant, first type 3–5 buyer phrases (comma-separated), then choose 2–4 seed topics (2–3 words).',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[], 'maxChoices'=>4
  ],
];

// ===== Your EXACT prompt (NOWDOC — no PHP interpolation) =====
$MASTER_PROMPT = <<<'PROMPT'
You are an onboarding strategist for a SaaS content platform. Each turn:
1) VALIDATE the user's previous answer (if any).
2) RETURN the single NEXT best question with a tailored hint and concise chips.

Principles:
- Keep total questions ≤ 6; move efficiently; never loop.
- No fluff; sound like a sharp content strategist.
- Adapt wording to the user's own terms from prior answers.
- Do NOT introduce industries, brands, or locations the user hasn't implied.
- If "industry" already has a specific phrase (e.g., "yoga studio"), treat it as valid and DO NOT re-ask that key; advance to the next unresolved key. Do not invent or suggest generic industries (e.g., SaaS, Consulting, Finance, Education) unless the user used those words.
- Hints: 1–2 sentences with small, context-relevant examples that mirror the user's niche vocabulary.
- Chips: 3–6 items, 1–3 words, deduped, clearly aligned to the user's niche/role/offer. The UI will also allow custom entries.
- If a key is already specific and actionable, skip it.

- Distinctness across the last 3 keys:
  * "authority_topics" = supply-side themes you want to own.
  * "buyer_language"   = demand-side phrases buyers use.
  * "seed_keywords"    = final 2–4 short, query-ready topics (2–3 words).

- If the options you generate sound repetitive or similar to earlier chips, switch to "mode":"text" and leave "options":[].

- Hints must include 1–2 concrete examples relevant to the user's business or service, not generic lists.

- If "buyer_language" and "seed_keywords" would produce very similar questions or data (for example, for tutors, coaches, therapists, or local service providers), MERGE them into one step:
  * Use key: "seed_keywords".
  * The question should ask the user for BOTH: 
      (a) 3–5 real phrases buyers or clients actually use when searching or asking, and 
      (b) 2–4 short, query-ready seed topics (2–3 words).
  * Keep mode:"chips+input" and include chips only for the seed topics (not for phrases).
  * The hint must clearly tell the user to first type phrases (comma-separated) and then choose or add short seed topics.
  * Skip the separate "buyer_language" step entirely when merged.

- Location integrity:
  * If prior answers include a multi-word location (e.g., "san francisco"), always output the full location string; never truncate to "San" or abbreviate to "SF" unless the user wrote "SF".
  * When locations appear in chips, place them at the end and keep the full city (e.g., "driveway pavers san francisco").
  * Never output clipped tokens or dangling words (e.g., "Patio pavers San").

- Seed keyword length policy:
  * Prefer 2–3-word seed topics for breadth (e.g., "homeowners insurance", "piano lessons", "speech therapy").
  * If a 2–3-word seed would be ambiguous, incomplete, or geo-critical, allow 2–4 words (e.g., "home insurance el cerrito ca").
  * If the user's previous answers explicitly mention a location (city, county, region, or state), you MAY include that location as part of the seed keyword when it improves search precision (e.g., "yoga classes los angeles", "real estate agent san jose ca").
  * Never include a location unless the user mentioned one.
  * Never output clipped or fragmentary phrases (e.g., "generate more qualified", "insurance agents EL").
  * Do not abbreviate locations or nouns; always write full, natural phrases (e.g., "el cerrito ca", not "EL" or "E.C.").

Validation rubric (previous answer):
- Relevance, Specificity, Non-garbage, No contradiction, Actionability.
Re-ask policy:
- If valid: do NOT re-ask.
- If invalid and first time for that key: ask ONE concise clarification.
- If still invalid after that: accept best-effort canonicalized and move on. Never ask a key more than twice.

Universal keys (choose next unresolved):
- industry
- ideal_audience
- primary_goal
- authority_topics
- buyer_language
- seed_keywords

Templates (generic; REWRITE them to sound personal):
{$templatesJson}

Prior answers (use to tailor wording, hints, and chips):
{$answersJson}

State (avoid repetition; keep total ≤ 6):
{$stateJson}

Target key for the next question (server-enforced; do not re-ask other keys):
{$targetKey}

Output JSON ONLY, no prose:
{
  "validation": {
    "key": string|null,
    "valid": boolean,
    "needs_clarification": boolean,
    "reason": string,
    "confidence": number,
    "canonicalized": string
  },
  "next": {
    "key": string,
    "q": string,
    "hint": string,
    "mode": "text"|"chips+input",
    "multi": boolean,
    "options": string[],
    "audit": { "signals_used": string[], "note": string }
  }
}
Temperature ≈ 0.5. Respond with valid JSON only.
PROMPT;

// ===== Helpers =====
function read_json(){ $raw=file_get_contents('php://input'); $d=json_decode($raw,true); return is_array($d)?$d:[]; }
function send($arr,$code=200){ http_response_code($code); echo json_encode($arr); exit; }

function save_project_simple($user_id,$project_name,$persona_json,$seed_keywords_json,$chat_log_json)
{
  global $mysqli;
  $user_id=(int)$user_id;
  $project_name=mysqli_real_escape_string($mysqli,$project_name);
  $persona_json=mysqli_real_escape_string($mysqli,$persona_json);
  $seed_keywords_json=mysqli_real_escape_string($mysqli,$seed_keywords_json);
  $chat_log_json=mysqli_real_escape_string($mysqli,$chat_log_json);
  $sql="INSERT INTO projects (user_id, project_name, persona_json, seed_keywords, chat_log)
        VALUES ($user_id, '$project_name', '$persona_json', '$seed_keywords_json', '$chat_log_json')";
        
  if(!mysqli_query($mysqli,$sql)){
    send(['ok'=>false,'status'=>'ERROR','error'=>'INSERT_FAILED','message'=>mysqli_error($mysqli)],500);
  }
  return mysqli_insert_id($mysqli);
}

function next_key($order,$full){ foreach($order as $k){ if(!array_key_exists($k,$full)) return $k; } return null; }
function step_index($order,$full){ $n=0; foreach($order as $k){ if(array_key_exists($k,$full)) $n++; else break; } return $n; }

function merge_answer($full,$current,$isMulti){
  $key=$current['key']??null; if(!$key) return $full;
  $text=trim((string)($current['text']??''));
  $selected=array_values(array_filter(($current['selected']??[]),fn($x)=>trim((string)$x)!=''));
  $custom  =array_values(array_filter(($current['custom']??[]),fn($x)=>trim((string)$x)!=''));
  $display=$isMulti?implode(', ',array_merge($selected,$custom)):($text!==''?$text:implode(', ',array_merge($selected,$custom)));
  $full[$key]=['key'=>$key,'display_value'=>$display,'status'=>'answered','selected_options'=>$selected,'custom_options'=>$custom];
  return $full;
}

function compact_answers($order,$templates,$full){
  $out=[]; foreach($order as $k){ if(!isset($full[$k])) continue;
    $rec=$full[$k]; $isMulti=!empty($templates[$k]['multi']);
    if($isMulti){ $m=array_merge($rec['selected_options']??[],$rec['custom_options']??[]); $out[$k]=array_values(array_filter($m,fn($x)=>trim((string)$x)!='')); }
    else{ $out[$k]=trim((string)($rec['display_value']??'')); }
  } return $out;
}

function build_prompt($MASTER_PROMPT,$templatesArr,$answersArr,$stateArr,$targetKey){
  $templatesJson=json_encode(array_values($templatesArr),JSON_UNESCAPED_UNICODE);
  $answersJson  =json_encode($answersArr,JSON_UNESCAPED_UNICODE);
  $stateJson    =json_encode($stateArr,JSON_UNESCAPED_UNICODE);
  return str_replace(
    ['{$templatesJson}','{$answersJson}','{$stateJson}','{$targetKey}'],
    [$templatesJson,    $answersJson,    $stateJson,    $targetKey],
    $MASTER_PROMPT
  );
}

// strip code fences + isolate JSON block
function extract_json($text){
  $t=trim($text);
  if (preg_match('/^```[a-zA-Z]*\s*(.+?)\s*```$/s',$t,$m)) $t=$m[1];
  $s=strpos($t,'{'); $e=strrpos($t,'}');
  if($s!==false && $e!==false && $e>$s){ $t=substr($t,$s,$e-$s+1); }
  return $t;
}

function call_gemini($api_key,$model,$prompt,$timeout=20){
  if(!$api_key) return ['text'=>'','raw'=>null];
  $url="https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key=".urlencode($api_key);
  $payload=['contents'=>[[ 'role'=>'user', 'parts'=>[[ 'text'=>$prompt ]] ]],'generationConfig'=>['temperature'=>0.5]];
  $ch=curl_init($url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
  curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($payload));
  curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);
  $resp=curl_exec($ch);
  if($resp===false){ curl_close($ch); return ['text'=>'','raw'=>null]; }
  curl_close($ch);
  $data=json_decode($resp,true);
  $text=$data['candidates'][0]['content']['parts'][0]['text']??'';
  return ['text'=>$text,'raw'=>$data];
}

// ===== Stateless temp-state (no PHP sessions) =====

// conversation key: JWT (if USE_JWT) or IP+UA
function get_conversation_key(bool $USE_JWT): string {
  if ($USE_JWT) {
    $auth = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    if (stripos($auth, 'Bearer ') === 0) {
      $jwt = trim(substr($auth, 7));
      $parts = explode('.', $jwt);
      if (count($parts) === 3) {
        $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
        if (is_array($payload)) {
          if (!empty($payload['sid'])) return 'jwt:'.$payload['sid'];
          if (!empty($payload['sub'])) return 'jwt:'.$payload['sub'];
        }
      }
    }
    // If JWT parsing fails or header missing, fall back to fingerprint
  }
  $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
  $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
  return 'fp:' . sha1($ip.'|'.$ua);
}

function conv_state_path(bool $USE_JWT): string {
  $dir = sys_get_temp_dir() . '/onboard_state';
  if (!is_dir($dir)) @mkdir($dir, 0777, true);
  return $dir . '/' . sha1(get_conversation_key($USE_JWT)) . '.json';
}

function load_state(bool $USE_JWT): array {
  $p = conv_state_path($USE_JWT);
  if (!file_exists($p)) return ['ts'=>time(),'clarified'=>[],'last_asked'=>null,'chat_log'=>[]];
  $j = json_decode(@file_get_contents($p), true);
  if (!is_array($j) || ($j['ts'] ?? 0) < time()-600) return ['ts'=>time(),'clarified'=>[],'last_asked'=>null,'chat_log'=>[]];
  return $j;
}

function save_state(array $s, bool $USE_JWT): void { $s['ts']=time(); @file_put_contents(conv_state_path($USE_JWT), json_encode($s)); }

function clear_state(bool $USE_JWT): void { @unlink(conv_state_path($USE_JWT)); }

// very light invalidity check (empty answer)
function is_invalid_answer($key,$current,$isMulti){
  if($isMulti){
    $n = (is_array($current['selected']??null)?count(array_filter($current['selected'],fn($x)=>trim((string)$x)!='')):0) +
         (is_array($current['custom']??null)?count(array_filter($current['custom'],fn($x)=>trim((string)$x)!='')):0);
    return $n < 1;
  } else {
    return trim((string)($current['text'] ?? '')) === '';
  }
}

// ===== Router =====
$body   = read_json();
$action = strtoupper(trim((string)($body['action'] ?? '')));

// INIT — Q1 from bank, remember asked
if ($action === 'INIT') {
  $firstKey = $QA_ORDER[0];
  $next = $QA_TEMPLATES[$firstKey]; // no LLM on first question (fast)

  $st = load_state($USE_JWT);
  $st['last_asked'] = [
    'key'=>$next['key'],'q'=>$next['q'],
    'hint'=>$next['hint'] ?? '',
    'options'=>$next['options'] ?? []
  ];
  save_state($st, $USE_JWT);

  send(['ok'=>true,'status'=>'NEXT','step'=>0,'next'=>$next]);
}

// ANSWER — log prev asked + current answer; clarify once if invalid; advance; save on done
if ($action === 'ANSWER') {
  $current = $body['current'] ?? [];            // { key, text, selected[], custom[] }
  $context = $body['context'] ?? [];            // { full_answers }
  $full    = is_array($context['full_answers'] ?? null) ? $context['full_answers'] : [];

  // Load state and log the previously asked question with this answer
  $st = load_state($USE_JWT);
  $lastAsked = $st['last_asked'] ?? null;
  if ($lastAsked && !empty($current['key'])) {
    $st['chat_log'][] = [
      'step' => step_index($QA_ORDER, $full), // step BEFORE merging
      'question' => [
        'key'     => $lastAsked['key'] ?? '',
        'text'    => $lastAsked['q'] ?? '',
        'hint'    => $lastAsked['hint'] ?? '',
        'options' => $lastAsked['options'] ?? [],
      ],
      'answer' => [
        'text'     => (string)($current['text'] ?? ''),
        'selected' => $current['selected'] ?? [],
        'custom'   => $current['custom'] ?? [],
      ],
      'timestamp' => gmdate('c'),
    ];
    save_state($st, $USE_JWT);
  }

  $ckey = $current['key'] ?? '';
  $isMulti = !empty($QA_TEMPLATES[$ckey]['multi']);
  $invalid = is_invalid_answer($ckey, $current, $isMulti);

  $alreadyClarified = in_array($ckey, $st['clarified'] ?? [], true);

  // If invalid and not yet clarified => REPEAT once on same key
  if ($invalid && !$alreadyClarified) {
    $st['clarified'][] = $ckey;

    // Which step are we on (for LLM usage rule)?
    $stepBefore = step_index($QA_ORDER, $full); // 0-based, equals index of current key
    $use_llm_this_turn = $USE_LLM && !($SECOND_FROM_BANK && $stepBefore == 1);

    $next = $QA_TEMPLATES[$ckey]; // default clarification from bank
    if ($use_llm_this_turn) {
      // LLM-crafted concise clarification for SAME key
      $answersCompact = compact_answers($QA_ORDER, $QA_TEMPLATES, $full);
      $prompt = build_prompt(
        $MASTER_PROMPT,
        $QA_TEMPLATES,
        $answersCompact,
        ['asked_keys'=>array_keys($answersCompact), 'max_questions'=>6, 'total_templates'=>count($QA_TEMPLATES)],
        $ckey
      );
      $gem = call_gemini($GEMINI_API_KEY, $GEMINI_MODEL, $prompt, $G_TIMEOUT_SEC);
      if (!empty($gem['text'])) {
        $clean = extract_json($gem['text']);
        $obj = json_decode($clean, true);
        if (is_array($obj) && !empty($obj['next']) && (($obj['next']['key']??'')===$ckey)) {
          $n = $obj['next'];
          $n['allowCustom'] = true;
          if ($ckey==='seed_keywords') $n['maxChoices']=4;
          $next = $n;
        }
      }
    }

    // remember we asked the clarification
    $st['last_asked'] = [
      'key'=>$next['key'],'q'=>$next['q'],
      'hint'=>$next['hint'] ?? '',
      'options'=>$next['options'] ?? []
    ];
    save_state($st, $USE_JWT);

    send(['ok'=>true,'status'=>'REPEAT','step'=>$stepBefore,'next'=>$next]);
  }

  // Accept & merge (even if still weak after one clarify)
  $full = merge_answer($full, $current, $isMulti);

  // Next key in strict order
  $targetKey = next_key($QA_ORDER, $full);

  // If no next key => SAVE project + chat_log; then clear temp state
  if ($targetKey === null) {
    $answersCompact = compact_answers($QA_ORDER, $QA_TEMPLATES, $full);

    $seed = $answersCompact['seed_keywords'] ?? [];
    if (!is_array($seed)) $seed = array_map('trim', explode(',', (string)$seed));
    $seed = array_values(array_filter($seed, fn($x)=>$x!==''));

    $persona = ['answers'=>$answersCompact, 'raw'=>$full, 'created_at'=>gmdate('c')];
    $persona_json = json_encode($persona, JSON_UNESCAPED_UNICODE);
    $seed_json    = json_encode($seed, JSON_UNESCAPED_UNICODE);

    // TODO: replace user_id from JWT when USE_JWT is true (sub/sid). For now, static.
    $user_id = 1;
    $project_name = 'Content Strategy Project ' . gmdate('Y-m-d');

    $chat_log_json = json_encode($st['chat_log'] ?? [], JSON_UNESCAPED_UNICODE);

    $pid = save_project_simple($user_id, $project_name, $persona_json, $seed_json, $chat_log_json);

    clear_state($USE_JWT);
    send(['ok'=>true,'status'=>'DONE','project_id'=>$pid,'message'=>'Saved']);
  }

  // Decide if we use LLM for the NEXT question (Q2 bank support)
  $stepAfter = step_index($QA_ORDER, $full); // equals index of NEXT question
  $use_llm_this_turn = $USE_LLM && !($SECOND_FROM_BANK && $stepAfter == 1);

  // Build NEXT
  $next = $QA_TEMPLATES[$targetKey]; // fallback/bank
  if ($use_llm_this_turn) {
    $answersCompact = compact_answers($QA_ORDER, $QA_TEMPLATES, $full);
    $prompt = build_prompt(
      $MASTER_PROMPT,
      $QA_TEMPLATES,
      $answersCompact,
      ['asked_keys'=>array_keys($answersCompact), 'max_questions'=>6, 'total_templates'=>count($QA_TEMPLATES)],
      $targetKey
    );
    $gem = call_gemini($GEMINI_API_KEY, $GEMINI_MODEL, $prompt, $G_TIMEOUT_SEC);
    if (!empty($gem['text'])) {
      $clean = extract_json($gem['text']);
      $obj = json_decode($clean, true);
      if (is_array($obj) && !empty($obj['next']) && (($obj['next']['key'] ?? '') === $targetKey)) {
        $n = $obj['next'];
        $n['allowCustom'] = true;
        if ($targetKey==='seed_keywords') $n['maxChoices']=4;
        $next = $n;
      }
    }
  }

  // remember asked NEXT for logging on the following turn
  $st['last_asked'] = [
    'key'=>$next['key'],'q'=>$next['q'],
    'hint'=>$next['hint'] ?? '',
    'options'=>$next['options'] ?? []
  ];
  save_state($st, $USE_JWT);

  send(['ok'=>true,'status'=>'NEXT','step'=>$stepAfter,'next'=>$next]);
}

// Unknown
send(['ok'=>false,'status'=>'ERROR','error'=>'UNKNOWN_ACTION'], 400);
