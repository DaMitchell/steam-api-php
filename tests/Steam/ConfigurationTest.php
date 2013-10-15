<?php
namespace Steam;

use Steam\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase 
{
    public function testSetSteamKey()
    {
        $steamKey = '123';
        $configuration = new Configuration();
        $this->assertInstanceOf('\Steam\Configuration', $configuration->setSteamKey($steamKey));
    }

    public function testGetSteamKey()
    {
        $steamKey = '123';
        $configuration = new Configuration();
        $configuration->setSteamKey($steamKey);
        $this->assertEquals($steamKey, $configuration->getSteamKey());
    }

    public function testSetAppId()
    {
        $appId = 123;
        $configuration = new Configuration();
        $this->assertInstanceOf('\Steam\Configuration', $configuration->setAppId($appId));
    }

    public function testGetAppId()
    {
        $appId = 123;
        $configuration = new Configuration();
        $configuration->setAppId($appId);
        $this->assertEquals($appId, $configuration->getAppId());
    }

    public function testGetBaseSteamApiUrl()
    {
        $steamBaseUrl = 'http://api.steampowered.com/';
        $configuration = new Configuration();
        $this->assertEquals($steamBaseUrl, $configuration->getBaseSteamApiUrl());
    }

    public function testSetOptions_Exception()
    {
        $this->setExpectedException('\Steam\Exception\InvalidConfigOptionException');
        $options = array('soft-kitty-warm-kitty-little-ball-of-fur' => true);
        $configuration = new Configuration();
        $configuration->setOptions($options);
    }
}