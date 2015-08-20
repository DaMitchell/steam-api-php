<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;

class GetMatchHistoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetMatchHistory
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetMatchHistory();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetMatchHistory', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
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

    public function testSettingAccountId()
    {
        $this->instance->setAccountId('123');
        $this->assertEquals(['account_id' => '123'], $this->instance->getParams());
    }

    public function testSettingMinPlayers()
    {
        $this->instance->setMinPlayers(5);
        $this->assertEquals(['min_players' => 5], $this->instance->getParams());
    }

    public function testSettingHeroId()
    {
        $this->instance->setHeroId(12);
        $this->assertEquals(['hero_id' => 12], $this->instance->getParams());
    }

    public function testSettingLeagueId()
    {
        $this->instance->setLeagueId(123);
        $this->assertEquals(['league_id' => 123], $this->instance->getParams());
    }

    public function testSettingStartAtMatchId()
    {
        $this->instance->setStartAtMatchId(123);
        $this->assertEquals(['start_at_match_id' => 123], $this->instance->getParams());
    }

    public function testSettingMatchesRequested()
    {
        $this->instance->setMatchesRequested(10);
        $this->assertEquals(['matches_requested' => 10], $this->instance->getParams());
    }

    public function testTournamentMatchesOnly()
    {
        $this->instance->setTournamentMatchesOnly(true);
        $this->assertEquals(['tournament_games_only' => true], $this->instance->getParams());
        $this->instance->setTournamentMatchesOnly(false);
        $this->assertEquals(['tournament_games_only' => false], $this->instance->getParams());
    }

    public function testSettingSkill()
    {
        $this->instance->setSkill(2);
        $this->assertEquals(['skill' => 2], $this->instance->getParams());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSettingInvalidSkill()
    {
        $this->instance->setSkill(100);
    }

    public function testSettingGameMode()
    {
        $this->instance->setGameMode(12);
        $this->assertEquals(['game_mode' => 12], $this->instance->getParams());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSettingInvalidGameMode()
    {
        $this->instance->setGameMode(100);
    }
}
