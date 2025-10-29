<?php
require_once dirname(dirname(__DIR__)) . '/common/config.php';
require_once dirname( dirname(dirname(__DIR__) ) ). '/db/connection.php';

//var_dump($credentials["GEMINI_KEY"]); die();
//var_dump($credentials["DB"]); die();

$mysqli = getDbConnection($credentials["DB"]);

if (!$mysqli) {
  http_response_code(500);
  header('Content-Type: application/json');
  echo json_encode(['ok'=>false,'error'=>'DB_CONNECTION_FAILED','message'=>mysqli_connect_error()]);
  exit;
}

mysqli_set_charset($mysqli, 'utf8mb4');

// Allow CORS for localhost dev
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;
header('Content-Type: application/json');

// ---- Question Bank ----
$QA = [
  [
    'key'=>'industry',
    'q'=>'Which industry do you mainly serve or what service do you offer?',
    'hint'=>'Short and specific is best.',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>[]
  ],
  [
    'key'=>'ideal_audience',
    'q'=>'Who do you most want to serve right now?',
    'hint'=>'Name the customer segment or scenario that best matches your work.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  [
    'key'=>'primary_goal',
    'q'=>'What is your main goal for the next 3–6 months?',
    'hint'=>'Think in outcomes you can point to.',
    'mode'=>'chips+input','multi'=>false,'allowCustom'=>true,'options'=>[]
  ],
  [
    'key'=>'authority_topics',
    'q'=>'Which topics or services do you want to be known for?',
    'hint'=>'Choose 1–3 short areas you want authority in.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  [
    'key'=>'buyer_language',
    'q'=>'Which phrases do prospects use before contacting you?',
    'hint'=>'Short terms they say or search for.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[]
  ],
  [
    'key'=>'seed_keywords',
    'q'=>'Pick 2–4 short seed topics (2–3 words).',
    'hint'=>'First list 3–5 short phrases your buyers or clients might say (comma-separated), then pick or add  2–4 short seed topics (2–3 words). These guide keyword research.',
    'mode'=>'chips+input','multi'=>true,'allowCustom'=>true,'options'=>[], 'maxChoices'=>4
  ],
];
// ---- Helpers ----
function read_json() {
  $raw = file_get_contents('php://input');
  $d = json_decode($raw, true);
  return is_array($d) ? $d : [];
}

function send($arr, $code=200){ 
  http_response_code($code); 
  echo json_encode($arr); 
  exit; 
}

/**
 * Simple insert function (no bind)
 */
function save_project($user_id, $project_name, $persona_json, $seed_keywords_json) {
  global $mysqli;
  $user_id = (int)$user_id;
  $project_name = mysqli_real_escape_string($mysqli, $project_name);
  $persona_json = mysqli_real_escape_string($mysqli, $persona_json);
  $seed_keywords_json = mysqli_real_escape_string($mysqli, $seed_keywords_json);

  $sql = "INSERT INTO projects (user_id, project_name, persona_json, seed_keywords)
          VALUES ($user_id, '$project_name', '$persona_json', '$seed_keywords_json')";

  if (!mysqli_query($mysqli, $sql)) {
    send(['ok'=>false,'status'=>'ERROR','error'=>'INSERT_FAILED','message'=>mysqli_error($mysqli)], 500);
  }
  return mysqli_insert_id($mysqli);
}

/**
 * Merge answer (no validation, no repeat)
 */
function merge_answer(array $qa, array $full_answers, array $current, bool $skip): array {
  $key = $current['key'] ?? null;
  if (!$key) return $full_answers;

  $text     = trim((string)($current['text'] ?? ''));
  $selected = array_values(array_filter(($current['selected'] ?? []), fn($x)=>trim((string)$x) !== ''));
  $custom   = array_values(array_filter(($current['custom']   ?? []), fn($x)=>trim((string)$x) !== ''));

  if ($skip) {
    $full_answers[$key] = [
      'key'=>$key,'display_value'=>'','status'=>'skipped',
      'selected_options'=>[],'custom_options'=>[],
    ];
  } else {
    $display = implode(', ', array_merge($selected, $custom));
    if ($display === '' && $text !== '') $display = $text;
    $full_answers[$key] = [
      'key'=>$key,
      'display_value'=>$display,
      'status'=>'answered',
      'selected_options'=>$selected,
      'custom_options'=>$custom,
    ];
  }
  return $full_answers;
}

function count_answered_in_order(array $qa, array $full_answers): int {
  $count = 0;
  foreach ($qa as $q) {
    if (array_key_exists($q['key'], $full_answers)) $count++;
    else break;
  }
  return $count;
}

// ---- MAIN ----
$body   = read_json();
$action = strtoupper(trim((string)($body['action'] ?? '')));

if ($action === 'INIT') {
  send(['ok'=>true,'status'=>'NEXT','step'=>0,'next'=>$QA[0]]);
}

if ($action === 'ANSWER') {
  $current = $body['current'] ?? [];
  $context = $body['context'] ?? [];
  $skip    = (bool)($context['skip'] ?? false);

  $full_answers = is_array($context['full_answers'] ?? null) ? $context['full_answers'] : [];

  // Merge current answer, move forward
  $full_answers = merge_answer($QA, $full_answers, $current, $skip);
  $answeredCount = count_answered_in_order($QA, $full_answers);
  $total = count($QA);

  // If all answered, save to DB
  if ($answeredCount >= $total) {
    $user_id = 1;
    $project_name = 'Content Strategy Project ' . gmdate('Y-m-d');

    $answersCompact = [];
    foreach ($QA as $q) {
      $k = $q['key'];
      $rec = $full_answers[$k] ?? null;
      if (!$rec) continue;
      if (!empty($q['multi'])) {
        $answersCompact[$k] = array_values(array_filter(array_merge($rec['selected_options'] ?? [], $rec['custom_options'] ?? []), fn($x)=>trim((string)$x) !== ''));
      } else {
        $answersCompact[$k] = trim((string)($rec['display_value'] ?? ''));
      }
    }

    // extract seed keywords
    $seedKeywords = [];
    if (!empty($answersCompact['seed_keywords'])) {
      $seedKeywords = is_array($answersCompact['seed_keywords'])
        ? $answersCompact['seed_keywords']
        : array_map('trim', explode(',', $answersCompact['seed_keywords']));
    }

    $persona = [
      'answers' => $answersCompact,
      'raw' => $full_answers,
      'created_at' => gmdate('c')
    ];

    $persona_json = json_encode($persona, JSON_UNESCAPED_UNICODE);
    $seed_json = json_encode($seedKeywords, JSON_UNESCAPED_UNICODE);

    $project_id = save_project($user_id, $project_name, $persona_json, $seed_json);

    send(['ok'=>true,'status'=>'DONE','project_id'=>$project_id,'message'=>'Saved successfully.']);
  }

  // otherwise next question
  $nextQ = $QA[$answeredCount];
  send(['ok'=>true,'status'=>'NEXT','step'=>$answeredCount,'next'=>$nextQ]);
}

send(['ok'=>false,'status'=>'ERROR','error'=>'UNKNOWN_ACTION'], 400);
