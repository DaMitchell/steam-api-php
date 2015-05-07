<?php

namespace Steam\Command\UserStats;

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
 