<?php

namespace Steam\Command\EconService;

use Steam\Command\CommandInterface;

class DeclineTradeOfferTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTradeOffer
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new DeclineTradeOffer(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconService', $this->instance->getInterface());
        $this->assertEquals('DeclineTradeOffer', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'tradeofferid' => 123,
        ], $this->instance->getParams());
    }

    public function assertParams($params)
    {
        $this->assertEquals(array_merge([
            'tradeofferid' => 123,
        ], $params), $this->instance->getParams());
    }
}
