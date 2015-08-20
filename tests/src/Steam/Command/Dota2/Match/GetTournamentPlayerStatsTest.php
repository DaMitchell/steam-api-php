<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;

class GetTournamentPlayerStatsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTournamentPlayerStats
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetTournamentPlayerStats(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetTournamentPlayerStats', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['account_id' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Match_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Match_570', $this->instance->getInterface());
    }

    public function testSettingLeague()
    {
        $this->instance->setLeagueId(123);

        $this->assertEquals(['account_id' => 123, 'league_id' => 123], $this->instance->getParams());
    }

    public function testSettingMatchId()
    {
        $this->instance->setMatchId(123);

        $this->assertEquals(['account_id' => 123, 'match_id' => 123], $this->instance->getParams());
    }

    public function testSettingHeroId()
    {
        $this->instance->setHeroId(123);

        $this->assertEquals(['account_id' => 123, 'hero_id' => 123], $this->instance->getParams());
    }

    public function testSettingDateMinAndMax()
    {
        $this->instance->setLeagueId(123);
        $this->instance->setHeroId(456);
        $this->instance->setMatchId(789);

        $this->assertEquals([
            'account_id' => 123,
            'league_id' => 123,
            'hero_id' => 456,
            'match_id' => 789,
        ], $this->instance->getParams());
    }
}
 