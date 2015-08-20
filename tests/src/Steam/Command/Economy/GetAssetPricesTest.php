<?php

namespace Steam\Command\Economy;

use Steam\Command\CommandInterface;

class GetAssetPricesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetAssetPrices
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetAssetPrices(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamEconomy', $this->instance->getInterface());
        $this->assertEquals('GetAssetPrices', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'appid' => 123,
            'language' => 'en',
        ], $this->instance->getParams());
    }

    public function testSettingCurrencyAppearsInParams()
    {
        $this->instance->setCurrency('GBP');

        $this->assertEquals([
            'appid' => 123,
            'currency' => 'GBP',
        ], $this->instance->getParams());
    }
}
 