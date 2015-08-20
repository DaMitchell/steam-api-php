<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class IsPlayingSharedGameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IsPlayingSharedGame
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new IsPlayingSharedGame(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('IsPlayingSharedGame', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'appid_playing' => 456,
        ], $this->instance->getParams());
    }
}
 