<?php

if (!function_exists(__NAMESPACE__ . 'querySelect')) {
    function querySelect($database, $table)
    {
        return 'SELECT * FROM `' . getenv("PROJECT_ID") . '.' . $database . '.' . $table . '`';
    }
}

if (!function_exists(__NAMESPACE__ . 'querySelectAnalytics')) {
    function querySelectAnalytics()
    {
        return 'SELECT * FROM `' . getenv("PROJECT_ID") . '.' . getenv("ANALYTICS_DATABASE") . '.' . getenv("ANALYTICS_TABLE") . '`';
    }
}

if (!function_exists(__NAMESPACE__ . 'querySelectAnalyticsCount')) {
    function querySelectAnalyticsCount($t)
    {
        return 'SELECT event_name, count(*) as total  FROM `' . getenv("PROJECT_ID") . '.' . getenv("ANALYTICS_DATABASE") . '.' . getenv("ANALYTICS_TABLE") . "` WHERE event_date >= '$t' group by event_name order by total DESC";
    }
}
