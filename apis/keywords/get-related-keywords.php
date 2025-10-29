<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

/*
$body = getInput();
$seed_keyword = $body['seed_keyword'] ?? null;
$depth = $body['depth'] ?? 0;

if (!is_array($seed_keyword) || !count($seed_keyword)) throw new Exception("Provide 'seed keyword' as a non-empty array.");

  //var_dump($seed_keyword);die();
  
  $buffer = getRelatedKeywords($seed_keyword[0],$depth);
   sendResponseJSON($buffer);

*/

function getRelatedKeywords($seed_keyword, $limit=100, $depth=0)
{
    $related_keywords_with_metrics = array();
    $related_keywords_with_without_metrics = array();

        $post_array = array();
        $api_path = "/v3/dataforseo_labs/google/related_keywords/live";
        $filters = [
        ["keyword_data.keyword_info.search_volume",">=",50],
        "and",
        ["keyword_data.keyword_info.search_volume","<=",10000],
        "and",
        ["keyword_data.keyword_info.cpc",">",0]];

        $post_array[] = array(
        "keyword" => $seed_keyword,
        "language_name" => "English",
        "location_code" => 2840,
        "include_serp_info"=> false,
        "include_seed_keyword"=> false,
        "include_clickstream_data"=>false,
        "replace_with_core_keyword"=>true,
        "filters" => $filters,
        "depth"=>$depth,
        "ignore_synonyms"=>false,
        "limit" => $limit
        );

        $result = callDataForSEO($api_path,$post_array);
        $keywords = $result["tasks"][0]["result"][0]["items"];
        
        //var_dump($keywords); die();

        foreach($keywords as $k) 
        {
            $intent = $k["keyword_data"]["search_intent_info"]["main_intent"] ?? 'not available';

            $competition = $k["keyword_data"]["keyword_info"]["competition"] ?? 0;
            $competition_level = $k["keyword_data"]["keyword_info"]["competition_level"] ?? "UNKNOWN";

            $cpc = $k["keyword_data"]["keyword_info"]["cpc"] ?? 0;

            $keyword_difficulty = $k["keyword_data"]["keyword_properties"]["keyword_difficulty"] ?? "UNKNOWN";
            $search_volume = $k["keyword_data"]["keyword_info"]["search_volume"];
            $rank = 1;

            $estimated_traffic = estimateTraffic($search_volume, $rank, $keyword_difficulty);

            $related_keywords_with_metrics[] =array(
                'keyword'=> $k["keyword_data"]["keyword"], 
                'competition' => $competition, 
                'competition_level'=> $competition_level,
                'cpc' => $cpc,
                'search_volume' => $search_volume,
                'estimated_traffic' => $estimated_traffic,
                "keyword_difficulty" => $keyword_difficulty,
                "search_intent" => $intent,
            );
            
            foreach($k["related_keywords"] as $related_kw)
                $related_keywords_with_without_metrics[]=$related_kw;
        }

        $buffer = array(
            "related_keywords_with_without_metrics" =>$related_keywords_with_without_metrics,
            "related_keywords_with_metrics" => $related_keywords_with_metrics
        );
        return $buffer;
}
?>