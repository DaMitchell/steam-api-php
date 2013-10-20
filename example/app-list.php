#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Steam\Configuration;
use Steam\Api\Apps;

$options = array(
    'appId' => \Steam\Apps::DOTA_2_ID,
);

$config = new Configuration($options);

$adapter = new Steam\Adapter\Guzzle($config);
$adapter->setSerializer(JMS\Serializer\SerializerBuilder::create()->build());

$apps = new Apps();
$apps->setAdapter($adapter);

try
{
    //$result = $apps->upToDateCheck(1);
    $result = $apps->getAppList();
    var_dump($result);
}
catch(Guzzle\Http\Exception\ClientErrorResponseException $e)
{
    var_dump($e->getRequest()->getUrl());
    var_dump($e->getResponse()->getBody(true));
}