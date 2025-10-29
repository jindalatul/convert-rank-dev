<?php
ini_set("display_errors","On");
require('RestClient.php');

function getInput()
{
  $body = json_decode(file_get_contents('php://input'), true);
  //if (is_array($body)!==true) throw new Exception("Invalid JSON body");
  return $body;
}

function sendResponseJSON($data, $status = 200) 
{
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Vary: Origin");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    // header("Access-Control-Allow-Credentials: true"); // only if needed
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function compute_score($sv, $cpc, $competition) 
{
    if ($sv < 0) $sv = 0;
    if ($cpc < 0) $cpc = 0;
    if ($competition < 0 || $competition > 1) $competition = 0.5; // default if missing

    $part1 = 0.6 * log($sv + 1);          // ln in PHP is log()
    $part2 = 0.3 * $cpc;
    $part3 = 0.1 * (1 - $competition);

    return round($part1 + $part2 + $part3, 4);
}

function estimateTraffic($search_volume, $rank, $difficulty = null) 
{
    // CTR table by ranking position (rough industry averages)
    $ctr_table = [
        1 => 0.30,
        2 => 0.15,
        3 => 0.10,
        4 => 0.07,
        5 => 0.05,
        6 => 0.04,
        7 => 0.03,
        8 => 0.025,
        9 => 0.02,
        10 => 0.02
    ];

    // get CTR for this rank
    if (isset($ctr_table[$rank])) {
        $ctr = $ctr_table[$rank];
    } elseif ($rank <= 20) {
        $ctr = 0.01;
    } else {
        $ctr = 0.005; // tiny CTR for low ranks
    }

    // base traffic = search volume × CTR
    $traffic = $search_volume * $ctr;

    // optionally adjust by difficulty (0–100 scale, lower = easier)
    if ($difficulty !== "UNKNOWN") {
        $probability = max(0.05, 1 - ($difficulty / 100)); 
        // ensures we never hit 0 completely
        $traffic = $traffic * $probability;
    }

    return round($traffic);
}

function callDataForSEO($api_path, $post_array)
{
        $envPath = dirname(dirname(__DIR__)) . '/env/data-for-seo-env.php';

        if (!file_exists($envPath)) {
            die('DataForSEO env file missing: ' . $envPath);
            return null;
        }
        $env = require $envPath;

        $client = NULL;

        try 
        {
            // Instead of 'login' and 'password' use your credentials from https://app.dataforseo.com/api-access
            $client = new RestClient($env['dfs_api_url'], null, $env['dfs_login'], $env['dfs_password']);
            //var_dump($client);

        }
        
        //$api_path="";

       catch (RestClientException $e) 
       {
            echo "n";
            print "HTTP code: {$e->getHttpCode()}n";
            print "Error code: {$e->getCode()}n";
            print "Message: {$e->getMessage()}n";
            print  $e->getTraceAsString();
            echo "n";
            exit();
        }
        try 
        {
            $result = $client->post($api_path, $post_array);
            return $result;
        } 
        catch (RestClientException $e) 
        {
            echo "n";
            print "HTTP code: {$e->getHttpCode()}n";
            print "Error code: {$e->getCode()}n";
            print "Message: {$e->getMessage()}n";
            print  $e->getTraceAsString();
            echo "n";
        }

        $client = null;
        return $result;
}
?>