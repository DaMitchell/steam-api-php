<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetNumberOfCurrentPlayersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetNumberOfCurrentPlayers
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetNumberOfCurrentPlayers(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetNumberOfCurrentPlayers', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'appid' => 123,
        ], $this->instance->getParams());
    }
}
 