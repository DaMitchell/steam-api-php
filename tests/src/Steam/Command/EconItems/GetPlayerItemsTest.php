<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetPlayerItemsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetPlayerItems
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetPlayerItems(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetPlayerItems', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 456], $this->instance->getParams());
    }
}
 