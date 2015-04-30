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

    public function testSettingLanguageIsCorrect()
    {
        $language = 'en';

        $this->configuration->setLanguage($language);

        $this->assertEquals($language, $this->configuration->getLanguage());
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
        $language = 'en';
        $options = array(
            'language' => $language
        );

        $this->configuration->setOptions($options);

        $this->assertEquals($language, $this->configuration->getLanguage());
    }
}