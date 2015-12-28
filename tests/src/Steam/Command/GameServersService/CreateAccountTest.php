<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class CreateAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateAccount
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new CreateAccount(123, 'memo');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('CreateAccount', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'memo' => 'memo',
        ], $this->instance->getParams());
    }
}
