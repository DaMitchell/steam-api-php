<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;

class GetLiveLeagueGamesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetLiveLeagueGames
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetLiveLeagueGames();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetLiveLeagueGames', $this->instance->getMethod());
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

    public function testSettingLeagueId()
    {
        $this->instance->setLeagueId(123);

        $this->assertEquals(['league_id' => 123], $this->instance->getParams());
    }

    public function testSettingMatchId()
    {
        $this->instance->setMatchId(123);

        $this->assertEquals(['match_id' => 123], $this->instance->getParams());
    }

    public function testSettingLeagueAndMatchId()
    {
        $this->instance->setLeagueId(123);
        $this->instance->setMatchId(456);

        $this->assertEquals([
            'league_id' => 123,
            'match_id' => 456,
        ], $this->instance->getParams());
    }
}
 