<?php
ini_set("display_errors","On");
require_once("get-metrics.php");
require_once("main-api.php");

$seed_keywords = [
  "solar install guide",
  "home solar benefits",
  "install solar steps",
  "solar system basics",
  "electricity generation process",
  "residential solar risks",
  "solar panel efficiency",
  "grid tie vs offgrid",
  "solar battery storage",
  "panel mounting options",
  "solar system lifespan",
  "installing solar safety",
  "solar energy myths",
  "clean energy saving",
  "commercial solar options",
  "install cost estimate",
  "solar panel cost",
  "average installation price",
  "solar system financing",
  "zero down solar plans",
  "price per watt",
  "solar loan options",
  "lease vs purchase",
  "installer quote comparison",
  "best value solar",
  "solar consultation request",
  "get solar quote",
  "book installation service",
  "schedule site inspection",
  "solar service agreement",
  "solar installer availability",
  "local permit requirements",
  "solar energy laws",
  "net metering policy",
  "building code compliance",
  "HOA solar rules",
  "solar interconnection application",
  "electrician license check",
  "NABCEP certified installer",
  "solar accreditation standards",
  "installer insurance coverage",
  "company references needed",
  "warranty coverage details",
  "solar technology trends",
  "perovskite solar cells",
  "bifacial panel technology",
  "smart solar monitoring",
  "AI energy management",
  "latest inverter models",
  "microinverter system cost",
  "solar shingle roofing",
  "ground mount systems",
  "thermal solar heating",
  "solar panel types",
  "monocrystalline vs polycrystalline",
  "panel repair service",
  "system troubleshooting guide",
  "poor solar output fix",
  "inverter error codes",
  "squirrel solar prevention",
  "solar system inspection",
  "panel cleaning methods",
  "annual maintenance plan",
  "proactive system checks",
  "roof inspection solar",
  "solar vs wind power",
  "gas heating alternatives",
  "geothermal energy pros",
  "utility company comparison",
  "return on investment",
  "property value increase",
  "carbon footprint reduction",
  "energy independence benefits",
  "payback period calculation",
  "solar tax credit rules",
  "state solar rebates",
  "installer vetting process",
  "choosing solar provider",
  "local solar companies",
  "install preparation guide",
  "structural roof survey",
  "solar panel removal cost",
  "battery installation service",
  "solar panel disposal",
  "electric vehicle charging",
  "energy storage solutions"
];

$keywordIdeas = getKeywordMetrics($seed_keywords);

sendResponseJSON($keywordIdeas);

/*
$keyword_without_data = array();
$buffer = array();

foreach($seed_keywords as $kwd)
{
    $relatedKeywords = getRelatedKeywords($kwd,100, 0);

    foreach($relatedKeywords["related_keywords_with_metrics"] as $k) 
            $buffer[]=$k;
    foreach($relatedKeywords["related_keywords_with_without_metrics"] as $k) 
            $keyword_without_data[]=$k;
}
                                
echo"<pre>==========TASK buffer==================</pre>";
echo"<pre>",var_dump($buffer),"</pre>";
echo"<pre>==========TASK keyword_without_data==================</pre>";
echo"<pre>",var_dump($keyword_without_data),"</pre>";
*/
?>