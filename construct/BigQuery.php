<?php

namespace Google\Construct;

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Storage\StorageClient;

class BigQuery
{

    private $bigQuery;

    public function __construct()
    {
        $this->bigQuery = new BigQueryClient([
            'keyFilePath' => __DIR__ . "/../" . getenv("KEY_FILE_PATH"),
            'projectId' => getenv("PROJECT_ID")
        ]);
    }

    public function table()
    {
// Get an instance of a previously created table.
        $dataset = $this->bigQuery->dataset('analytics_236119420');
        $table = $dataset->table('events_ (1)');

// Begin a job to import data from a CSV file into the table.
        $loadJobConfig = $table->load(
            fopen('/data/my_data.csv', 'r')
        );
        $job = $table->runJob($loadJobConfig);
    }

    public function query($query)
    {
        $response = array();
        $queryJobConfig = $this->bigQuery->query($query);
        $queryResults = $this->bigQuery->runQuery($queryJobConfig);
        foreach ($queryResults as $row) {
            $response[] = $row;
        }
        return json_encode($response);
    }

}