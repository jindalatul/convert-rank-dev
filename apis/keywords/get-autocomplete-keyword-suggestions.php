<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

/*
$body = getInput();
$seed_keyword = $body['seed_keyword'] ?? null;

if (!is_array($seed_keyword) || !count($seed_keyword)) throw new Exception("Provide Seed Keyword.");

  //var_dump($seed_keyword);die();
  
  $buffer = getAutocompleteKeywordSuggestions($seed_keyword[0]);
  sendResponseJSON($buffer);
*/

function getAutocompleteKeywordSuggestions($seed_keyword, $depth=2, $limit=200)
{
    try
    {
        $buffer=array();
        $post_array = array();
        $api_path = "/v3/serp/google/autocomplete/live/advanced";

        $post_array[] = array(
        "keyword" => $seed_keyword,
        "language_name" => "English",
        "location_code" => 2840,
        'depth' => $depth,
        'limit' => $limit,
        "priority" => 2
        );

        $result = callDataForSEO($api_path,$post_array);
        
        //var_dump($result); die();

        $keywords = @$result["tasks"][0]["result"][0]["items"];
        
        if($keywords==NULL) return false;
        else
        {
          foreach($keywords as $k) 
          {
            $buffer[] = $k["suggestion"];
            /*
              $buffer[] =array(
                  'keyword'=> $k["suggestion"], 
                  'relevance' => $k["relevance"]
              );
            */
          }
          return $buffer;
        }
      }
      catch(error)
      {

      }
}
?>