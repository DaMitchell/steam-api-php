<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class GetUserGroupListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetUserGroupList
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetUserGroupList(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('GetUserGroupList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamid' => 123,
        ], $this->instance->getParams());
    }
}
 