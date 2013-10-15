#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Steam\Configuration;
use Steam\Api\Apps;

$options = array(
    'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
    'appId' => \Steam\Apps::DOTA_2_ID
);

$config = new Configuration($options);

$adapter = new Steam\Adapter\Guzzle();
$adapter->setSerializer(JMS\Serializer\SerializerBuilder::create()->build());

$apps = new Apps($config);
$apps->setAdapter($adapter);

try
{
    $result = $apps->upToDateCheck(1);
    var_dump($result);
}
catch(Guzzle\Http\Exception\ClientErrorResponseException $e)
{
    var_dump($e->getRequest()->getUrl());
    var_dump($e->getResponse()->getBody(true));
}