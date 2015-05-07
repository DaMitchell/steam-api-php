<?php

namespace Steam\Command\PlayerService;

class GetSteamLevelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetSteamLevel
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetSteamLevel(123);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetSteamLevel', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 123], $this->instance->getParams());
    }
}
 