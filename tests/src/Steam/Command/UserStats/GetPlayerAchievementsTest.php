<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetPlayerAchievementsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetPlayerAchievements
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetPlayerAchievements(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetPlayerAchievements', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'appid' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'steamid' => 123,
            'appid' => 456,
            'l' => 'en'
        ], $this->instance->getParams());
    }
}
 