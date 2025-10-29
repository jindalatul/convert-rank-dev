<?php
// ------------------------------
// Simple Gemini File Upload (PHP)
// ------------------------------

// 🔧 CONFIGURATION
/*

for verification of uploaded file.

/*
To check after file upload, pass the returned url with ?key = gemini-key
https://generativelanguage.googleapis.com/v1beta/files/411oqcjycowa?key=
*/

/*
https://chatgpt.com/c/68f9e32c-3ff0-832d-bb12-70ee379736e8

*/
$apiKey    = ""; // <-- paste your key here
$filePath  = __DIR__ . "/data.json"; // local file path
$mimeType  = "application/json";              // file type

if (!file_exists($filePath)) {
    die("File not found: $filePath");
}

// --- Step 1: START the resumable upload ---
$startUrl = "https://generativelanguage.googleapis.com/upload/v1beta/files";

$fileSize = filesize($filePath);
$displayName = basename($filePath);

$ch = curl_init($startUrl);
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => [
        "x-goog-api-key: $apiKey",
        "X-Goog-Upload-Protocol: resumable",
        "X-Goog-Upload-Command: start",
        "X-Goog-Upload-Header-Content-Length: $fileSize",
        "X-Goog-Upload-Header-Content-Type: $mimeType",
        "Content-Type: application/json",
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode(['file' => ['display_name' => $displayName]]),
    CURLOPT_HEADER => true,
    CURLOPT_RETURNTRANSFER => true,
]);
$response = curl_exec($ch);
if ($response === false) {
    die("Start upload error: " . curl_error($ch));
}
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headersRaw = substr($response, 0, $headerSize);
curl_close($ch);

// Extract the upload URL
$uploadUrl = null;
foreach (explode("\r\n", $headersRaw) as $line) {
    if (stripos($line, 'X-Goog-Upload-Url:') === 0) {
        $uploadUrl = trim(substr($line, strlen('X-Goog-Upload-Url:')));
        break;
    }
}
if (!$uploadUrl) {
    die("Could not get resumable upload URL.\n$headersRaw\n");
}

// --- Step 2: UPLOAD + FINALIZE ---
$data = file_get_contents($filePath);
$ch = curl_init($uploadUrl);
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => [
        "Content-Length: $fileSize",
        "X-Goog-Upload-Offset: 0",
        "X-Goog-Upload-Command: upload, finalize",
        "Content-Type: $mimeType",
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_RETURNTRANSFER => true,
]);
$fileInfoJson = curl_exec($ch);
if ($fileInfoJson === false) {
    die("Upload bytes error: " . curl_error($ch));
}
curl_close($ch);

// --- Step 3: Display result ---
$fileInfo = json_decode($fileInfoJson, true);
$fileUri  = $fileInfo['file']['uri'] ?? 'N/A';
$state    = $fileInfo['file']['state'] ?? 'unknown';

echo "<pre>";
echo "Upload State: $state\n";
echo "File URI: $fileUri\n";
echo "\nFull API Response:\n";
print_r($fileInfo);
echo "</pre>";
