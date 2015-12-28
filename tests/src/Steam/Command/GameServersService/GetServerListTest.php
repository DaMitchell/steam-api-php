<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class GetServerListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetServerList
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetServerList();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('GetServerList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
