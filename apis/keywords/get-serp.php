<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

$body = getInput();
$topic = $body['topic'] ?? null;
if (!is_array($topic) || !count($topic)) throw new Exception("Provide 'topic name' as a non-empty array.");
  
  $buffer = getSERP($topic[0]);
  sendResponseJSON($buffer);

function getSERP($topic)
{
    $organic_results = array();

        $post_array = array();
        $api_path = "/v3/serp/google/organic/live/advanced";

        $post_array[] = array(
        "keyword" => mb_convert_encoding($topic,"UTF-8"),
        "language_name" => "English",
        "location_code" => 2840,
        );

        $result = callDataForSEO($api_path,$post_array);
        $keywords = $result["tasks"][0]["result"][0]["items"];
        
        //var_dump($keywords); die();

        foreach($keywords as $k) 
        {
            if($k["type"]=="organic")
            {
                $organic_results[]=array(   "title"=>$k["title"],
                                            "description"=>$k["description"],
                                            "url" => $k["url"],
                                            "domain" => $k["domain"]);
            }
        }
        return $organic_results;
}
?>