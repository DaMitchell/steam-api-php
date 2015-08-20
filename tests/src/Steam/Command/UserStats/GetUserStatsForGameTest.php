<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetUserStatsForGameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetUserStatsForGame
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetUserStatsForGame(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetUserStatsForGame', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'appid' => 456,
        ], $this->instance->getParams());
    }
}
 