<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetSchemaURLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetSchemaURL
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetSchemaURL(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetSchemaURL', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
