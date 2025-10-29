<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

/*
$body = getInput();
$keywords = $body['keywords'] ?? null;

if (!is_array($keywords) || !count($keywords)) throw new Exception("Provide 'keywords' as a non-empty array.");

  $buffer = getKeywordMetrics($keywords);
  sendResponseJSON($buffer);
*/

function getKeywordMetrics(array $keyword_chunk)
{
        //var_dump($keyword_chunk);die();
        $post_array = array();
        $api_path = "/v3/dataforseo_labs/google/keyword_overview/live";

        $filters = array(
          array("keyword_data.keyword_info.search_volume", ">=", 20),
          "and",
          array("keyword_data.keyword_info.search_volume","<=",10000),
          "and",
          array("keyword_data.keyword_info.cpc",">",0)
        );

        $post_array[] = array(
        "keywords" => $keyword_chunk,
        "language_name" => "English",
        "location_code" => 2840,
        "filters" => $filters,
        "include_serp_info"=> false,
        "include_seed_keyword"=> false,
        "include_clickstream_data"=>false,
        "replace_with_core_keyword"=>true,
        "ignore_synonyms"=>false,
        );

        $result = callDataForSEO($api_path,$post_array);
        $keywords = [];

        if (
            isset($result["tasks"]) &&
            isset($result["tasks"][0]["result"]) &&
            isset($result["tasks"][0]["result"][0]["items"])
        ) 
        {
          $keywords = $result["tasks"][0]["result"][0]["items"];
        }
        
        //var_dump($keywords); die();

        $buffer = array();
        foreach($keywords as $k) 
        {
          $intent = $k["search_intent_info"]["main_intent"] ?? 'not available';

          $competition = $k["keyword_info"]["competition"] ?? 0;
          $competition_level = $k["keyword_info"]["competition_level"] ?? "UNKNOWN";

          $competition = $k["keyword_info"]["competition"] ?? 0;
          $competition_level = strtoupper($k["keyword_info"]["competition_level"] ?? "UNKNOWN");

          // If competition = 0, fallback from level
          if ($competition == 0) {
                switch ($competition_level) {
                    case "LOW":    $competition = 0.3; break;
                    case "MEDIUM": $competition = 0.6; break;
                    case "HIGH":   $competition = 0.9; break;
                    default:       $competition = 0.5; break; // UNKNOWN
                }
          }

          // Now — reverse logic: if level is UNKNOWN, derive from competition numeric value
          if ($competition_level === "UNKNOWN" || $competition_level === "" || $competition_level === null) {
                if ($competition < 0.33) {
                    $competition_level = "LOW";
                } elseif ($competition < 0.66) {
                    $competition_level = "MEDIUM";
                } else {
                    $competition_level = "HIGH";
                }
          }

          // Safety clamp
          $competition = max(0, min(1, (float)$competition));

          $cpc = $k["keyword_info"]["cpc"] ?? 0;

          //$keyword_difficulty = $k["keyword_properties"]["keyword_difficulty"];
          
          $keyword_difficulty = $k["keyword_properties"]["keyword_difficulty"] ?? "UNKNOWN";
          $search_volume = $k["keyword_info"]["search_volume"];
          $rank = 1;

          $computed_score = compute_score($search_volume, $cpc, $competition );
          $estimated_traffic = estimateTraffic($search_volume, $rank, $keyword_difficulty);

            $buffer[] =array(
                'keyword'=> $k["keyword"], 
                'competition' => $competition, 
                'competition_level'=> $competition_level,
                'cpc' => $cpc,
                'search_volume' => $search_volume,
                'estimated_traffic' => $estimated_traffic,
                'keyword_score' => $computed_score,
                "keyword_difficulty" => $keyword_difficulty,
                "search_intent" => $intent,
            );
        }
        return $buffer;
}
?>