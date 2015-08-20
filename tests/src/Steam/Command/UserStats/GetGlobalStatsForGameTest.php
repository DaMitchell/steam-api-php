<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetGlobalStatsForGameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetGlobalStatsForGame
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetGlobalStatsForGame(570, ['test']);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetGlobalStatsForGame', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'appid' => 570,
            'count' => 1,
            'name' => ['test'],
        ], $this->instance->getParams());
    }

    public function testSettingStartAndEndData()
    {
        $date = new \DateTime();

        $this->instance->setStartDate($date);
        $this->instance->setEndDate($date);

        $this->assertEquals([
            'appid' => 570,
            'count' => 1,
            'name' => ['test'],
            'startdate' => $date->getTimestamp(),
            'enddate' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }
}
 