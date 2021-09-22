<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

require_once 'vendor/autoload.php';

use Google\Construct\BigQuery;

$date = date("Ymd", strtotime("-1 month"));
$bigQuery = new BigQuery();

/**
 * Example query select analytics
 */
//$queryResults = $bigQuery->query(querySelectAnalytics() . " WHERE event_date > '$date' LIMIT 100");
//foreach (json_decode($queryResults) as $row) {
//    echo $row->event_name . "<br>";
//}

/**
 * Example query select analytics by last month
 */
$queryResults = $bigQuery->query(querySelectAnalyticsCount($date));
print_r($queryResults);
