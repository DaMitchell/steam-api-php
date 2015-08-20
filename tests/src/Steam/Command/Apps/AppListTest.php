<?php

namespace Steam\Command\Apps;

use Steam\Command\CommandInterface;

class AppListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetAppList
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetAppList();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamApps', $this->instance->getInterface());
        $this->assertEquals('GetAppList', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 