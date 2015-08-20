<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;

class GetScheduledLeagueGamesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetScheduledLeagueGames
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetScheduledLeagueGames();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetScheduledLeagueGames', $this->instance->getMethod());
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

    public function testSettingDateMin()
    {
        $date = new \DateTime();
        $this->instance->setDateMin($date);

        $this->assertEquals(['date_min' => $date->getTimestamp()], $this->instance->getParams());
    }

    public function testSettingDateMax()
    {
        $date = new \DateTime();
        $this->instance->setDateMax($date);

        $this->assertEquals(['date_max' => $date->getTimestamp()], $this->instance->getParams());
    }

    public function testSettingDateMinAndMax()
    {
        $date = new \DateTime();

        $this->instance->setDateMin($date);
        $this->instance->setDateMax($date);

        $this->assertEquals([
            'date_min' => $date->getTimestamp(),
            'date_max' => $date->getTimestamp(),
        ], $this->instance->getParams());
    }
}
 