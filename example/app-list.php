#!/usr/bin/env php
<?php

include_once '../vendor/autoload.php';

use Steam\Configuration;
use Steam\Api\Apps;

$options = array(
    'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
);

$config = new Configuration($options);

$adapter = new Steam\Adapter\Guzzle();
$adapter->setSerializer(JMS\Serializer\SerializerBuilder::create()->build());

$apps = new Apps($config);
$apps->setAdapter($adapter);

$result = $apps->getAppList();

var_dump($result);