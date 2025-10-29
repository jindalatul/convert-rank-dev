<?php
ob_start();
ini_set('memory_limit', '-1');
ini_set("display_errors","Off");

require_once("main-api.php");
require_once("get-keyword-ideas.php");
require_once("get-keyword-suggestions.php");
require_once("get-related-keywords.php");
require_once("get-autocomplete-keyword-suggestions.php");
require_once("get-metrics.php");

$body = getInput();

//var_dump($body); die();

$buffer = array();
$keyword_without_data = array();

$keywordIdeas = getKeywordIdeas($body["keywordIdeas"],10);

/*
Keyword Suggestions, Auto-complete, Related Keywords all take seed keyword as input so we run these as parallel requests.
*/

$keywordSuggestions = getKeywordSuggestions($body["seed_keyword"],10);
$relatedKeywords = getRelatedKeywords($body["seed_keyword"],100, 0);
$autocompleteKeywords = getAutocompleteKeywordSuggestions($body["seed_keyword"]);


//var_dump($keywordIdeas);
//var_dump($keywordSuggestions);

foreach($keywordIdeas as $k)  $buffer[]=$k;
foreach($keywordSuggestions as $k) $buffer[]=$k;
foreach($relatedKeywords["related_keywords_with_metrics"] as $k) $buffer[]=$k;

foreach($relatedKeywords["related_keywords_with_without_metrics"] as $k) $keyword_without_data[]=$k;
foreach($autocompleteKeywords as $k) $keyword_without_data[]=$k;

$other_kwd_metrics = getKeywordMetrics($keyword_without_data);

foreach($other_kwd_metrics as $k) $buffer[]=$k;

sendResponseJSON($buffer);
?>