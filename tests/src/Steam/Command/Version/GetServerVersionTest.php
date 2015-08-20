<?php

namespace Steam\Command\Version;

use Steam\Command\CommandInterface;

class GetServerVersionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetServerVersion
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetServerVersion(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGCVersion_123', $this->instance->getInterface());
        $this->assertEquals('GetServerVersion', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 