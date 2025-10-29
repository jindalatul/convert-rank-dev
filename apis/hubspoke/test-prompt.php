<?php
/*
To check after file upload, pass the returned url with ?key = gemini-key
https://generativelanguage.googleapis.com/v1beta/files/411oqcjycowa?key=
*/

$API_KEY   = "";  // rotate your key since it was shared
$MODEL     = "models/gemini-2.5-flash";
$FILE_URI  = "https://generativelanguage.googleapis.com/v1beta/files/411oqcjycowa";

$prompt = "Analyze this uploaded JSON and summarize: 
- top-level keys
- counts or basic stats
Return a brief, human-readable summary.";

$res = geminiPromptWithFile($API_KEY, $MODEL, $FILE_URI, $prompt, false);

if (!$res["ok"]) {
    http_response_code(500);
    echo "<pre>HTTP {$res['http']}\n";
    print_r($res["error"]);
    echo "</pre>";
    exit;
}

// Print model text
$txt = $res["data"]["candidates"][0]["content"]["parts"][0]["text"] ?? "";
echo "<pre>$txt</pre>";

/**
 * Send a prompt to Gemini using a previously uploaded File (Files API).
 * Uses the stable combo you confirmed works: fileData (HTTPS URI) + mimeType text/plain, file part first.
 */
function geminiPromptWithFile(
    string $apiKey,
    string $model,         // e.g. "models/gemini-2.5-flash"
    string $fileHttpsUri,  // e.g. "https://generativelanguage.googleapis.com/v1beta/files/411oqcjycowa"
    string $promptText,
    bool   $jsonOutput = false,   // set true if you want strict JSON back
    int    $retries = 1           // retry once on 5xx
) : array {
    $endpoint = "https://generativelanguage.googleapis.com/v1beta/{$model}:generateContent";

    $body = [
        "contents" => [[
            "role"  => "user",
            "parts" => [
                // ✅ file first, with camelCase keys and text/plain
                [ "fileData" => [ "fileUri" => $fileHttpsUri, "mimeType" => "text/plain" ] ],
                [ "text"     => $promptText ]
            ]
        ]]
    ];
    if ($jsonOutput) {
        $body["generationConfig"] = [ "responseMimeType" => "application/json" ];
    }

    $json = json_encode($body, JSON_UNESCAPED_SLASHES);

    $doCall = function() use ($endpoint, $apiKey, $json) {
        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER     => [ "Content-Type: application/json", "x-goog-api-key: $apiKey" ],
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $json,
            CURLOPT_RETURNTRANSFER => true
        ]);
        $resp = curl_exec($ch);
        $http = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $err  = $resp === false ? curl_error($ch) : null;
        curl_close($ch);
        return [$http, $resp, $err];
    };

    [$http, $resp, $err] = $doCall();
    if ($http >= 500 && $http < 600 && $retries > 0) {
        usleep(600000); // 0.6s backoff
        [$http, $resp, $err] = $doCall();
    }

    if ($resp === false) return [ "ok" => false, "http" => 0,   "error" => $err ];
    $data = json_decode($resp, true);
    if ($http < 200 || $http >= 300) return [ "ok" => false, "http" => $http, "error" => $data ];

    return [ "ok" => true, "http" => $http, "data" => $data ];
}


/*
// try_file_variants.php
$API_KEY   = "AIzaSyBrvherZX6ljNeTwsm4SsQXIIBS0Tza3rQ"; // rotate your key (you posted it above)
$FILE_ID   = "files/411oqcjycowa";  // from "name"
$FILE_URI  = "https://generativelanguage.googleapis.com/v1beta/files/411oqcjycowa"; // from "uri"
$MODELS    = ["models/gemini-2.5-flash", "models/gemini-2.5-pro", "models/gemini-flash-latest"];
$PROMPT    = "Analyze the uploaded JSON and summarize top-level keys and counts.";

// helper
function call_gen($model, $apiKey, $body, $label) {
  $url = "https://generativelanguage.googleapis.com/v1beta/{$model}:generateContent";
  $json = json_encode($body, JSON_UNESCAPED_SLASHES);
  echo "\n=== $label ($model) REQUEST ===\n$json\n";
  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER     => ["Content-Type: application/json", "x-goog-api-key: $apiKey"],
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $json,
    CURLOPT_RETURNTRANSFER => true,
  ]);
  $resp = curl_exec($ch);
  $http = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
  curl_close($ch);
  echo "=== $label ($model) RESPONSE (HTTP $http) ===\n$resp\n";
  return [$http, $resp];
}

// text-only sanity
foreach ($MODELS as $m) {
  $probe = ["contents" => [[ "role" => "user", "parts" => [["text" => "ok?"]] ]]];
  call_gen($m, $API_KEY, $probe, "TEXT-ONLY");
}

// file variants to try (ordered by what most commonly works)
$variants = [
  // A) camelCase, HTTPS uri, NO mime, file first
  function($uri,$prompt){ return [
    "contents" => [[
      "role"  => "user",
      "parts" => [
        ["fileData" => ["fileUri" => $uri]],
        ["text" => $prompt],
      ]
    ]]
  ];},
  // B) camelCase, HTTPS uri, WITH mime, file first (text/plain)
  function($uri,$prompt){ return [
    "contents" => [[
      "role"  => "user",
      "parts" => [
        ["fileData" => ["fileUri" => $uri, "mimeType" => "text/plain"]],
        ["text" => $prompt],
      ]
    ]]
  ];},
  // C) camelCase, HTTPS uri, WITH mime=application/json, text first
  function($uri,$prompt){ return [
    "contents" => [[
      "role"  => "user",
      "parts" => [
        ["text" => $prompt],
        ["fileData" => ["fileUri" => $uri, "mimeType" => "application/json"]],
      ]
    ]]
  ];},
  // D) snake_case, HTTPS uri, WITH mime (some stacks still accept snake)
  function($uri,$prompt){ return [
    "contents" => [[
      "role"  => "user",
      "parts" => [
        ["text" => $prompt],
        ["file_data" => ["file_uri" => $uri, "mime_type" => "application/json"]],
      ]
    ]]
  ];},
  // E) camelCase, SHORT id (files/...), NO mime
  function($id,$prompt){ return [
    "contents" => [[
      "role"  => "user",
      "parts" => [
        ["fileData" => ["fileUri" => $id]],
        ["text" => $prompt],
      ]
    ]]
  ];},
];

foreach ($MODELS as $m) {
  foreach ($variants as $i => $builder) {
    // try HTTPS first for A-D, then SHORT id for E
    $use = ($i === 4) ? $FILE_ID : $FILE_URI;
    [$http, $resp] = call_gen($m, $API_KEY, $builder($use, $PROMPT), "WITH-FILE VAR ".($i+1));
    if ($http >= 200 && $http < 300) {
      echo "\n✅ SUCCESS with VAR ".($i+1)." on $m\n";
      exit;
    }
  }
}

echo "\n❌ All variants returned non-2xx. Paste the last two responses and we’ll zero-in further.\n";

*/
