#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\Response;
use Steam\Configuration;
use Steam\Command\WebApiUtil\GetSupportedApiList;
use Steam\Runner\GuzzleRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

$config = include_once './steamKey.php';

$steam = new Steam(new Configuration([
    Configuration::STEAM_KEY => $config['key'],
]));
$steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));

/** @var FutureResponse $result */
$result = $steam->run(new GetSupportedApiList());

$result->then(function(Response $response){
    $callback = function($interface) {
        foreach($interface['methods'] as $method) {
            echo sprintf("/%s/%s/%s\n", $interface['name'], $method['name'], 'v' . $method['version']);
        }
    };

    array_map($callback, $response->json()['apilist']['interfaces']);
});