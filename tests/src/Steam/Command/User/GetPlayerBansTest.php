<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class GetPlayerBansTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetPlayerBans
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetPlayerBans([123,456]);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('GetPlayerBans', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamids' => '123,456',
        ], $this->instance->getParams());
    }
}
 