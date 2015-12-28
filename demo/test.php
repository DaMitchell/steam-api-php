#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Steam\Configuration;
use Steam\Runner\GuzzleRunner;
use Steam\Runner\DecodeJsonStringRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

$steam = new Steam(new Configuration());
$steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));
$steam->addRunner(new DecodeJsonStringRunner());

/** @var array $result */
$result = $steam->run(new \Steam\Command\Apps\GetAppList());

var_dump($result);