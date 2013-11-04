<?php
namespace Steam;

use Steam\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * @var Configuration
     */
    protected $_configuration;
    
    public function setUp()
    {
        $this->_configuration = new Configuration();
    }
    
    public function testSetSteamKey()
    {
        $steamKey = '123';

        $this->assertInstanceOf('\Steam\Configuration', $this->_configuration->setSteamKey($steamKey));
    }

    public function testGetSteamKey()
    {
        $steamKey = '123';

        $this->_configuration->setSteamKey($steamKey);

        $this->assertEquals($steamKey, $this->_configuration->getSteamKey());
    }

    public function testSetAppId()
    {
        $appId = 123;

        $this->assertInstanceOf('\Steam\Configuration', $this->_configuration->setAppId($appId));
    }

    public function testGetAppId()
    {
        $appId = 123;

        $this->_configuration->setAppId($appId);

        $this->assertEquals($appId, $this->_configuration->getAppId());
    }

    public function testGetBaseSteamApiUrl()
    {
        $steamBaseUrl = 'http://api.steampowered.com/';

        $this->assertEquals($steamBaseUrl, $this->_configuration->getBaseSteamApiUrl());
    }

    public function testSettingLanguageIsCorrect()
    {
        $language = 'en';

        $this->_configuration->setLanguage($language);

        $this->assertEquals($language, $this->_configuration->getLanguage());
    }

    /**
     * @expectedException \Steam\Exception\InvalidConfigOptionException
     */
    public function testSetOptionsExpectException()
    {
        $options = array('soft-kitty-warm-kitty-little-ball-of-fur' => true);
        $this->_configuration = new Configuration();
        $this->_configuration->setOptions($options);
    }

    public function testSetOptionsWithValidOptions()
    {
        $language = 'en';
        $options = array(
            'language' => $language
        );

        $this->_configuration->setOptions($options);

        $this->assertEquals($language, $this->_configuration->getLanguage());
    }
}