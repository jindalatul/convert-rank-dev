<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

$body = getInput();
$keywords = $body['keywords'] ?? null;

if (!is_array($keywords) || !count($keywords)) throw new Exception("Provide 'keywords' as a non-empty array.");

  $buffer = getKeywordDifficulty($keywords);
  sendResponseJSON($buffer);

function getKeywordDifficulty($keyword_chunk)
{
        $post_array = array();
        $api_path = "/v3/dataforseo_labs/google/bulk_keyword_difficulty/live";

        $post_array[] = array(
        "keywords" => $keyword_chunk,
        "language_name" => "English",
        "location_code" => 2840
        );

        $result = callDataForSEO($api_path,$post_array);
        $keywords = $result["tasks"][0]["result"][0]["items"];
        
        $buffer = array();
        foreach($keywords as $k) 
        {
            $buffer[] = array(
                'keyword'=> $k["keyword"], 
                'keyword_difficulty_1' => $k["keyword_difficulty_1"]
            );
        }
        return $buffer;
}
?>