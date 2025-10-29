<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

/*
$body = getInput();
$keywords = $body['keywords'] ?? null;
if (!is_array($keywords) || !count($keywords)) throw new Exception("Provide 'keywords' as a non-empty array.");
  
  //var_dump($keywords); die();

  $buffer = getKeywordIdeas($keywords);
  sendResponseJSON($buffer);
*/
/*
For our hubspoke idea, use broad match for all possible ideas
*/

function getKeywordIdeas($keywords,$limit)
{
        $post_array = array();
        $api_path = "v3/dataforseo_labs/google/keyword_ideas/live";

        if (!is_array($keywords) || count($keywords) <= 0) {
            return [];
        }

        $filters = [
        ["keyword_info.search_volume",">=",50],
        "and",
        ["keyword_info.search_volume","<=",10000],
        "and",
        ["keyword_info.cpc",">",0]];

        $post_array[] = array(
        "keywords" => $keywords,
        "language_name" => "English",
        "location_code" => 2840,
        "filters" => $filters,
        "closely_variants" => true,
        "ignore_synonyms"=>false,
        "include_serp_info"=> false,
        "include_seed_keyword"=> false,
        "include_clickstream_data"=>false,
        "replace_with_core_keyword"=>true,
        "limit" => $limit
        );

        $result = callDataForSEO($api_path,$post_array);
        $keywords = $result["tasks"][0]["result"][0]["items"];
        
        //var_dump($keywords); die();

        foreach($keywords as $k) 
        {
            $intent = $k["search_intent_info"]["main_intent"] ?? 'not available';

            $competition = $k["keyword_info"]["competition"] ?? 0;
            $competition_level = $k["keyword_info"]["competition_level"] ?? "UNKNOWN";

            $cpc = $k["keyword_info"]["cpc"] ?? 0;

            $keyword_difficulty= $k["keyword_properties"]["keyword_difficulty"] ?? "UNKNOWN";
            $search_volume = $k["keyword_info"]["search_volume"];
            $rank = 1;

            $estimated_traffic = estimateTraffic($search_volume, $rank, $keyword_difficulty);

           $buffer[] =array(
                'keyword'=> $k["keyword"], 
                'competition' => $competition, 
                'competition_level'=> $competition_level,
                'cpc' => $cpc,
                'search_volume' => $search_volume,
                'estimated_traffic' => $estimated_traffic,
                "keyword_difficulty" => $keyword_difficulty,
                "search_intent" => $intent,
            );
        }
        return $buffer;
}
?>