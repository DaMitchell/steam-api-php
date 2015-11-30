<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class SetMemoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SetMemo
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new SetMemo(123, 'memo');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('SetMemo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'memo' => 'memo',
        ], $this->instance->getParams());
    }
}
