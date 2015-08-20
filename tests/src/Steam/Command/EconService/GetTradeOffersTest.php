<?php

namespace Steam\Command\EconService;

use Steam\Command\CommandInterface;

class GetTradeOffersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTradeOffers
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetTradeOffers();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconService', $this->instance->getInterface());
        $this->assertEquals('GetTradeOffers', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'get_sent_offers' => false,
            'get_received_offers' => false,
            'get_descriptions' => false,
            'active_only' => false,
            'historical_only' => false,
        ], $this->instance->getParams());
    }

    public function testSettingGetSendOffers()
    {
        $this->instance->setGetSentOffers(true);
        $this->assertParams(['get_sent_offers' => true]);
    }

    public function testSettingGetReceivedOffers()
    {
        $this->instance->setGetReceivedOffers(true);
        $this->assertParams(['get_received_offers' => true]);
    }

    public function testSettingGetDescriptions()
    {
        $this->instance->setGetDescriptions(true);
        $this->assertParams(['get_descriptions' => true]);
    }

    public function testSettingLanguage()
    {
        $this->instance->setLanguage('en');
        $this->assertParams(['language' => 'en']);
    }

    public function testSettingActiveOnly()
    {
        $this->instance->setActiveOnly(true);
        $this->assertParams(['active_only' => true]);
    }

    public function testSettingHistoricalOnly()
    {
        $this->instance->setHistoricalOnly(true);
        $this->assertParams(['historical_only' => true]);
    }

    public function testSettingTimeHistoricalCutoff()
    {
        $date = new \DateTime();
        $this->instance->setTimeHistoricalCutoff($date);
        $this->assertParams(['time_historical_cutoff' => $date->getTimestamp()]);
    }

    public function assertParams($params)
    {
        $this->assertEquals(array_merge([
            'get_sent_offers' => false,
            'get_received_offers' => false,
            'get_descriptions' => false,
            'active_only' => false,
            'historical_only' => false,
        ], $params), $this->instance->getParams());
    }
}
