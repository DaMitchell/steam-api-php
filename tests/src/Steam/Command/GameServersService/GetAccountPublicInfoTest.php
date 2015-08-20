<?php

namespace Steam\Command\GameServersService;

use Steam\Command\CommandInterface;

class GetAccountPublicInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetAccountPublicInfo
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetAccountPublicInfo(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IGameServersService', $this->instance->getInterface());
        $this->assertEquals('GetAccountPublicInfo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 123], $this->instance->getParams());
    }
}
 