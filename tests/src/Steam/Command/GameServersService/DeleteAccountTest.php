<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class DeleteAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteAccount
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new DeleteAccount(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('DeleteAccount', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
