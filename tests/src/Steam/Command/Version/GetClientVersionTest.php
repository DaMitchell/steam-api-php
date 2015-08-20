<?php

namespace Steam\Command\Version;

use Steam\Command\CommandInterface;

class GetClientVersionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetClientVersion
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetClientVersion(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGCVersion_123', $this->instance->getInterface());
        $this->assertEquals('GetClientVersion', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 