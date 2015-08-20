<?php

namespace Steam\Command\RemoteStorage;

use Steam\Command\CommandInterface;

class GetUGCFileDetailsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetUGCFileDetails
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetUGCFileDetails(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamRemoteStorage', $this->instance->getInterface());
        $this->assertEquals('GetUGCFileDetails', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'appid' => 123,
            'ugcid' => 456,
        ], $this->instance->getParams());
    }

    public function testSettingSteamId()
    {
        $this->instance->setSteamId(123);

        $this->assertEquals([
            'appid' => 123,
            'ugcid' => 456,
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
