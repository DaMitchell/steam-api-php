#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Steam\Configuration;
use Steam\Runner\GuzzleRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

$config = new Configuration();

$client = new Client([
    /*'defaults' => [
        'future' => true,
    ],*/
]);

$steam = new Steam($config);
$steam->addRunner(new GuzzleRunner($client, new GuzzleUrlBuilder()));

/** @var \GuzzleHttp\Message\FutureResponse $result */
$result = $steam->run(new \Steam\Command\Apps\GetAppList());

$test = '';

$result->then(function(\GuzzleHttp\Message\Response $response) use (&$test){
    $test = array_keys($response->json());
});

var_dump($test);
