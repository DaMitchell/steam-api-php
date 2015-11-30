<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class ResetLoginTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResetLoginToken
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new ResetLoginToken(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('ResetLoginToken', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
