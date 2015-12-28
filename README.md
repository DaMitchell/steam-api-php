#Steam API Wrapper
[![Build Status](https://travis-ci.org/DaMitchell/steam-api-php.png?branch=master)](https://travis-ci.org/DaMitchell/steam-api-php)

A PHP wrapper for the Steam API

It would be great to hear from people that are actively using this. 
Here is a link to Gitter [https://gitter.im/DaMitchell/steam-api-php](https://gitter.im/DaMitchell/steam-api-php).

This is v2 of the library and it is pretty much a rewirte that makes it more flexible. It will allow you to do whatever you want to the response whether that is to get an array of map the response onto an object.

I have based all the available commands on what is documented here [https://lab.xpaw.me/steam_api_documentation.html](https://lab.xpaw.me/steam_api_documentation.html).

Installation
------------
Install the latest version using [Composer](http://getcomposer.org) by running `composer require da-mitchell/steam-api`

Usage
-----
```php
<?php

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
```

Configuration
-------------
The configuration object has now has 1 option from the 3 that were in v1:
- **steamKey**, the API key you can get from [http://steamcommunity.com/dev/apikey](http://steamcommunity.com/dev/apikey).

Command
-------
Commands are the essentially classes that describe each endpoint. Each command implements `Steam\Command\CommandInterface` and has methods that will give the runners its interface, method, version, HTTP method and any params the endpoint requires.

I have implemented all commands for all the of the GET endpoints. Im not really sure which POST ones to implements since I am not really sure how some of them work. So if anyone understands them please implement them and put in a PR and I will add them in..

Runners
-------
So runners are pretty simple objects, they implement `Steam\Runner\RunnerInterface` which has 3 methods, the most important being `run`. They other 2 are for setting the config object, 

The run method has 2 arguments, `$command` and `$result`. Obviously `$command` is the endpoint you request on and `$result` is the result of the previous runner. This means that the `$result` of the first runner attached will be null.

Tests
-----
Run the tests from the project root with `php vendor/bin/phpunit`
