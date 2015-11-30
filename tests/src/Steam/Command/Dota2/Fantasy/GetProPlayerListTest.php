<?php

namespace Steam\Command\Dota2\Fantasy;


use Steam\Command\CommandInterface;

class GetProPlayerListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetProPlayerList
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetProPlayerList();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IDOTA2Fantasy_570', $this->instance->getInterface());
        $this->assertEquals('GetProPlayerList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 