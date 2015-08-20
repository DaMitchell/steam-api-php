<?php

namespace Steam\Command\Dota2\Fantasy;

use Steam\Command\CommandInterface;

class GetFantasyPlayerStatsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetFantasyPlayerStats
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetFantasyPlayerStats(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetFantasyPlayerStats', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['FantasyLeagueID' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Fantasy_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Fantasy_570', $this->instance->getInterface());
    }

    public function testSettingStartTime()
    {
        $date = new \DateTime();
        $this->instance->setStartTime($date);

        $this->assertEquals([
            'FantasyLeagueID' => 123,
            'StartTime' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }

    public function testSettingEndTime()
    {
        $date = new \DateTime();
        $this->instance->setEndTime($date);

        $this->assertEquals([
            'FantasyLeagueID' => 123,
            'EndTime' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }

    public function testSettingMatchId()
    {
        $this->instance->setMatchId(456);

        $this->assertEquals([
            'FantasyLeagueID' => 123,
            'matchid' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingSeriesId()
    {
        $this->instance->setSeriesId(456);

        $this->assertEquals([
            'FantasyLeagueID' => 123,
            'SeriesID' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingPlayerAccountId()
    {
        $this->instance->setPlayerAccountId(456);

        $this->assertEquals([
            'FantasyLeagueID' => 123,
            'PlayerAccountID' => 456,
        ], $this->instance->getParams());
    }
}
