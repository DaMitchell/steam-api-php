<?php

namespace Steam\Command\GameServersService;

class GetServerSteamIDsByIPTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetServerSteamIDsByIP
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetServerSteamIDsByIP('127.0.0.1');
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('GetServerSteamIDsByIP', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['server_ips' => '127.0.0.1'], $this->instance->getParams());
    }
}
 