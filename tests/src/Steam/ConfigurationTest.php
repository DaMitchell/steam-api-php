<?php
namespace Steam;

class ConfigurationTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * @var Configuration
     */
    protected $configuration;
    
    public function setUp()
    {
        $this->configuration = new Configuration();
    }
    
    public function testSetSteamKey()
    {
        $steamKey = '123';

        $this->assertInstanceOf('\Steam\Configuration', $this->configuration->setSteamKey($steamKey));
    }

    public function testGetSteamKey()
    {
        $steamKey = '123';

        $this->configuration->setSteamKey($steamKey);

        $this->assertEquals($steamKey, $this->configuration->getSteamKey());
    }

    public function testGetBaseSteamApiUrl()
    {
        $steamBaseUrl = 'http://api.steampowered.com';

        $this->assertEquals($steamBaseUrl, $this->configuration->getBaseSteamApiUrl());
    }

    /**
     * @expectedException \Steam\Exception\InvalidConfigOptionException
     */
    public function testSetOptionsExpectException()
    {
        $options = array('soft-kitty-warm-kitty-little-ball-of-fur' => true);
        $this->configuration = new Configuration();
        $this->configuration->setOptions($options);
    }

    public function testSetOptionsWithValidOptions()
    {
        $key = 'steam-api-key';
        $options = array(
            Configuration::STEAM_KEY => $key
        );

        $this->configuration->setOptions($options);

        $this->assertEquals($key, $this->configuration->getSteamKey());
    }
}