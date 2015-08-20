<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class GetRecentlyPlayedGamesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetRecentlyPlayedGames
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetRecentlyPlayedGames(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetRecentlyPlayedGames', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamid' => 123,
            'count' => 0,
        ], $this->instance->getParams());
    }

    public function testSettingCountToNull()
    {
        $this->instance->setCount(null);

        $this->assertEquals([
            'steamid' => 123,
            'count' => 0,
        ], $this->instance->getParams());
    }
}
 