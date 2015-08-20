<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetSchemaForGameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetSchemaForGame
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetSchemaForGame(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserStats', $this->instance->getInterface());
        $this->assertEquals('GetSchemaForGame', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
        ], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'appid' => 123,
            'l' => 'en'
        ], $this->instance->getParams());
    }
}
 