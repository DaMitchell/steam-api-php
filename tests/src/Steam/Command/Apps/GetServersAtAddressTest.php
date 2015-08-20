<?php

namespace Steam\Command\Apps;

use Steam\Command\CommandInterface;

class GetServersAtAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetServersAtAddress
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetServersAtAddress('127.0.0.1');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamApps', $this->instance->getInterface());
        $this->assertEquals('GetServersAtAddress', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['addr' => '127.0.0.1'], $this->instance->getParams());
    }
}
