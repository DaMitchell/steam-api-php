<?php

namespace Steam\Command\Dota2\MatchStats;

use Steam\Command\CommandInterface;

class GetRealtimeStatsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetRealtimeStats
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetRealtimeStats(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2MatchStats_570', $this->instance->getInterface());
        $this->assertEquals('GetRealtimeStats', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'server_steam_id' =>  123,
        ], $this->instance->getParams());
    }
}
