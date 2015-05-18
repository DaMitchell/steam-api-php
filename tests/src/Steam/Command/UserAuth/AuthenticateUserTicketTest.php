<?php

namespace Steam\Command\UserAuth;

class AuthenticateUserTicketTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AuthenticateUserTicket
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new AuthenticateUserTicket(123, 'test');
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserAuth', $this->instance->getInterface());
        $this->assertEquals('AuthenticateUserTicket', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'ticket' => 'test',
        ], $this->instance->getParams());
    }
}
