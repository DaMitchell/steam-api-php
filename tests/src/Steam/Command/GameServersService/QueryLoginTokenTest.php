<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class QueryLoginTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var QueryLoginToken
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new QueryLoginToken('login_token_test');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('QueryLoginToken', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'login_token' => 'login_token_test',
        ], $this->instance->getParams());
    }
}
