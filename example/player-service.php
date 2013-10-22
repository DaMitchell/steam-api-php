#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Steam\Configuration;
use Steam\Api\PlayerService;

$options = array(
    'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
    'appId' => \Steam\Apps::DOTA_2_ID,
);

$config = new Configuration($options);

$adapter = new Steam\Adapter\Guzzle($config);
$adapter->setSerializer(JMS\Serializer\SerializerBuilder::create()->build());

$playerService = new PlayerService();
$playerService->setAdapter($adapter);

try
{
    //$result = $playerService->getRecentlyPlayedGames(76561198049450178);
    $result = $playerService->getOwnedGames(76561198049450178);
    var_dump($result);
}
catch(Guzzle\Http\Exception\ClientErrorResponseException $e)
{
    var_dump($e->getRequest()->getUrl());
    var_dump($e->getResponse()->getBody(true));
}