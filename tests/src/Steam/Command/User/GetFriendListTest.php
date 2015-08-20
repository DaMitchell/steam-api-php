<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class GetFriendListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetFriendList
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetFriendList(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('GetFriendList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamid' => 123
        ], $this->instance->getParams());
    }

    public function testSettingRelationshipShowsInParams()
    {
        $this->instance->setRelationship('friend');

        $this->assertEquals([
            'steamid' => 123,
            'relationship' => 'friend',
        ], $this->instance->getParams());
    }
}
 