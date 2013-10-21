<?php
namespace Steam;

use Steam\Api\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFriendList()
    {
        $result = array(
            'friendslist' => array(
                array(
                    'steamid' => 9568333,
                    'relationship' => 'friend',
                    'friend_since' => 1234567890111,
                ),
                array(
                    'steamid' => 9568333,
                    'relationship' => 'friend',
                    'friend_since' => 1234567890111,
                ),
                array(
                    'steamid' => 9568333,
                    'relationship' => 'friend',
                    'friend_since' => 1234567890111,
                ),
            )
        );

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
                        ->disableOriginalConstructor()
                        ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());
        $mock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $user = new User();
        $user->setAdapter($mock);
        $friends = $user->getFriendList(123);
        $this->assertEquals($result, $friends);
    }

    /**
     * @expectedException \Steam\Api\Exception\UserNotExists
     */
    public function testGetFriendListException()
    {
        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());

        $user = new User();
        $user->setAdapter($mock);
        $user->getFriendList('%%%soft-kitty-bad-kitty-ball-of-not-controlled-anger-with-dude%%%');
    }

    public function testGetPlayerBans()
    {
    }

    public function testGetPlayerSummaries()
    {
    }

    public function testGetUserGroupList()
    {
    }

    public function testResolveVanityUrl()
    {
    }

}