<?php

namespace Steam\Command\Dota2\Ticket;

use Steam\Command\CommandInterface;

class SetSteamAccountPurchasedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SetSteamAccountPurchased
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new SetSteamAccountPurchased(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2Ticket_570', $this->instance->getInterface());
        $this->assertEquals('SetSteamAccountPurchased', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'eventid' => 123,
            'steamid' => 456,
        ], $this->instance->getParams());
    }
}
