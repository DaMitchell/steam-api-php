#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Configuration;
use Steam\Api\User;

$options = array(
    'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
);

$config = new Configuration($options);

$adapter = new Guzzle($config);
$adapter->setSerializer(SerializerBuilder::create()->build());

$user = new User();
$user->setAdapter($adapter);

$result = $user->getFriendList(76561198049450178);

var_dump($result);
