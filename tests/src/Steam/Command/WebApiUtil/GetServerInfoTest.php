<?php

namespace Steam\Command\WebApiUtil;


use Steam\Command\CommandInterface;

class GetServerInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetServerInfo
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetServerInfo();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamWebAPIUtil', $this->instance->getInterface());
        $this->assertEquals('GetServerInfo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 