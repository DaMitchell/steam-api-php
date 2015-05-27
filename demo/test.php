#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Steam\Configuration;
use Steam\Runner\GuzzleRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

$steam = new Steam(new Configuration());
$steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));

/** @var \GuzzleHttp\Message\FutureResponse $result */
$result = $steam->run(new \Steam\Command\Apps\GetAppList());

$appList = [];

$result->then(function(\GuzzleHttp\Message\Response $response){
    var_dump($response->json());
});