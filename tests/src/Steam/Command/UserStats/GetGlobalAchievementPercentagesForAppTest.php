<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetGlobalAchievementPercentagesForAppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetGlobalAchievementPercentagesForApp
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetGlobalAchievementPercentagesForApp(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetGlobalAchievementPercentagesForApp', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'gameid' => 123,
        ], $this->instance->getParams());
    }
}
 