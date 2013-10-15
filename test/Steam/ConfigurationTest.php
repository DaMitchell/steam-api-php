<?php
namespace Steam;
namespace Steam\Exception;
namespace PHPUnit;
use PHPUnit_Framework_TestCase;
use Steam\Configuration;
use Steam\Exception\InvalidConfigOptionException;

require __DIR__ . '/../../src/Steam/Configuration.php';
require __DIR__ . '/../../src/Steam/Exception/InvalidConfigOptionException.php';

class ConfigurationTest extends PHPUnit_Framework_TestCase {

    public function test_setSteamKey()
    {
        $steamKey = '123';
        $configuration = new Configuration();
        $this->assertInstanceOf('\Steam\Configuration', $configuration->setSteamKey($steamKey));
    }

    public function test_getSteamKey()
    {
        $steamKey = '123';
        $configuration = new Configuration();
        $configuration->setSteamKey($steamKey);
        $this->assertEquals($steamKey, $configuration->getSteamKey());
    }

    public function test_setAppId()
    {
        $appId = 123;
        $configuration = new Configuration();
        $this->assertInstanceOf('\Steam\Configuration', $configuration->setAppId($appId));
    }

    public function test_getAppId()
    {
        $appId = 123;
        $configuration = new Configuration();
        $configuration->setAppId($appId);
        $this->assertEquals($appId, $configuration->getAppId());
    }

    public function test_getBaseSteamApiUrl()
    {
        $steamBaseUrl = 'http://api.steampowered.com/';
        $configuration = new Configuration();
        $this->assertEquals($steamBaseUrl, $configuration->getBaseSteamApiUrl());
    }

    public function test_setOptions_Exception()
    {
        $this->setExpectedException('\Steam\Exception\InvalidConfigOptionException');
        $options = array('soft-kitty-warm-kitty-little-ball-of-fur' => true);
        $configuration = new Configuration();
        $configuration->setOptions($options);
    }
}