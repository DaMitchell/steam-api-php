#Steam API Wrapper
[![Build Status](https://travis-ci.org/DaMitchell/steam-api-php.png?branch=master)](https://travis-ci.org/DaMitchell/steam-api-php)

A PHP wrapper for the Steam API

Usage
-----
```php
<?php

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Configuration;
use Steam\Api\User;

$config = new Configuration(array(
    'steamKey' => '{STEAM_KEY}',
));

$adapter = new Guzzle($config);
$adapter->setSerializer(SerializerBuilder::create()->build());

$user = new User();
$user->setAdapter($adapter);

$result = $user->getFriendList(76561198049450178);
```

Configuration
-------------
The configuration object has 3 options:
- **steamKey**, the API key you can get from [http://steamcommunity.com/dev/apikey](http://steamcommunity.com/dev/apikey).
- **appId**, the ID of the game.
- **language**, the language you wish the results to be in. 

Adapters
--------
Adapters here are the classes that make the requests to the Steam API. They must implement `\Steam\Adapter\AdapterInterface`. They can also, but are not required to, extend `\Steam\Adapter\AdapterAbstract`, which just has some useful properties and methods.

I have implemented one adapter so far which makes use of the [https://github.com/guzzle/guzzle](Guzzle) library. The constructor of the class takes in the configuration object describes in the previous section. Another library the Guzzle adapter makes use of is the [http://jmsyst.com/libs/serializer](serializer) from Johannes Schmitt.
