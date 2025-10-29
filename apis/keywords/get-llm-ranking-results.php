<?php
ini_set('memory_limit', '-1');
ini_set("display_errors","On");
require_once("main-api.php");

  $body = json_decode(file_get_contents('php://input'), true);
  if (!is_array($body)) throw new Exception("Send JSON body like: {\"topic\": [\"bookkeeping\"]}");
  $topic = $body['topic'] ?? null;
  $platform = $body['platform'] ?? null;
  $model = $body["model_name"] ?? null;

  if (!is_array($topic) || !count($topic)) throw new Exception("Provide 'topic name' as a non-empty array.");
  
  $buffer = getLLM_Rankings($topic[0],$platform,$model);
  var_dump($buffer); die();

function getLLM_Rankings($topic,$platform,$model)
{
    // USE API to get all models and based on those models, you can input model and its LLM.
    // remember to input right model and right llm. This only causes problems.

    $buffer=array();

    if($platform=="chat_gpt")
        $api_path = "/v3/ai_optimization/chat_gpt/llm_responses/live";

    if($platform == "claude")
         $api_path = "/v3/ai_optimization/claude/llm_responses/live";

        $post_array = array();

        $post_array[] = array(
        "user_prompt" => $topic,
        "model_name" => "claude-opus-4-20250514",
        "web_search" => true,
        "force_web_search" => true
        );

        $result = callDataForSEO($api_path,$post_array);
        $keywords = $result["tasks"][0]["result"][0]["items"];
        
       var_dump($keywords); die();

        foreach($keywords as $k) 
        {
            $item = array();
            foreach($k["sections"] as $s)
                {
                    $item["text"] = $s["text"];
                    $item["annotations"] = $s["annotations"];
                }
            $buffer[] = $item;
        }
        return $buffer;
}
?>