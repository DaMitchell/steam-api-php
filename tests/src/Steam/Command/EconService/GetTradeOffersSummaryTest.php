<?php

namespace Steam\Command\EconService;

use Steam\Command\CommandInterface;

class GetTradeOffersSummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTradeOffersSummary
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetTradeOffersSummary();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconService', $this->instance->getInterface());
        $this->assertEquals('GetTradeOffersSummary', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }

    public function testSettingTimeLastVisit()
    {
        $date = new \DateTime();
        $this->instance->setTimeLastVisit($date);
        $this->assertEquals([
            'time_last_visit' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }
}
