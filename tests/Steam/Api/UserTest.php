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
        $result = array(
            'players' => array(
                array(
                    'steamid' => 9568333,
                    'CommunityBanned' => true,
                    'VACBanned' => false,
                    'EconomyBan' => 'none',
                ),
                array(
                    'steamid' => 9568333,
                    'CommunityBanned' => true,
                    'VACBanned' => false,
                    'EconomyBan' => 'none',
                ),
                array(
                    'steamid' => 9568333,
                    'CommunityBanned' => true,
                    'VACBanned' => false,
                    'EconomyBan' => 'none',
                ),
                array(
                    'steamid' => 9568333,
                    'CommunityBanned' => true,
                    'VACBanned' => false,
                    'EconomyBan' => 'none',
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
        $bans = $user->getPlayerBans(array(111));
        $this->assertEquals($result, $bans);
    }

    /**
     * @expectedException \Steam\Api\Exception\UserNotExists
     */
    public function testGetPlayerBansUserNotExistsException()
    {
        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());

        $user = new User();
        $user->setAdapter($mock);
        $user->GetPlayerBans(array('%%%soft-kitty-bad-kitty-ball-of-not-controlled-anger-with-dude%%%'));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetPlayerBansInsufficientParametersException()
    {
        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();

        $user = new User();
        $user->setAdapter($mock);
        $user->GetPlayerBans(array());
    }

    public function testGetPlayerSummaries()
    {
        $result = array(
            'response'=> array(
                'players' => array(
                    array(
                        'steamid' => 9568333,
                        'communityvisibilitystate' => 5,
                        'profilestate' => 1,
                        'personaname' => 'none',
                        'lastlogoff' => 1234567890,
                        'profileurl' => 'url',
                        'avatar' => 'url',
                        'avatarmedium' => 'url',
                        'avatarfull' => 'url',
                        'personastate' => 1,
                    ),
                    array(
                        'steamid' => 9568333,
                        'communityvisibilitystate' => 5,
                        'profilestate' => 1,
                        'personaname' => 'none',
                        'lastlogoff' => 1234567890,
                        'profileurl' => 'url',
                        'avatar' => 'url',
                        'avatarmedium' => 'url',
                        'avatarfull' => 'url',
                        'personastate' => 1,
                    ),
                    array(
                        'steamid' => 9568333,
                        'communityvisibilitystate' => 5,
                        'profilestate' => 1,
                        'personaname' => 'none',
                        'lastlogoff' => 1234567890,
                        'profileurl' => 'url',
                        'avatar' => 'url',
                        'avatarmedium' => 'url',
                        'avatarfull' => 'url',
                        'personastate' => 1,
                    ),
                    array(
                        'steamid' => 9568333,
                        'communityvisibilitystate' => 5,
                        'profilestate' => 1,
                        'personaname' => 'none',
                        'lastlogoff' => 1234567890,
                        'profileurl' => 'url',
                        'avatar' => 'url',
                        'avatarmedium' => 'url',
                        'avatarfull' => 'url',
                        'personastate' => 1,
                    ),
                )
            )
        );

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());
        $mock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $user = new User();
        $user->setAdapter($mock);
        $sum = $user->getPlayerSummaries(array(111));
        $this->assertEquals($result, $sum);
    }

    /**
     * @expectedException \Steam\Api\Exception\UserNotExists
     */
    public function testGetPlayerSummariesException()
    {
        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());

        $user = new User();
        $user->setAdapter($mock);
        $user->getPlayerSummaries(array('%%%soft-kitty-bad-kitty-ball-of-not-controlled-anger-with-dude%%%'));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetPlayerSummariesInsufficientParametersException()
    {
        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();

        $user = new User();
        $user->setAdapter($mock);
        $user->GetPlayerSummaries(array());
    }

    public function testGetUserGroupList()
    {
        $result = array(
            'result' => 1,
            'groups' => array(
                array(
                    'guid' => 9568333,
                ),
                array(
                    'guid' => 9568333,
                ),
                array(
                    'guid' => 9568333,
                ),
                array(
                    'guid' => 9568333,
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
        $groups = $user->getUserGroupList(123);
        $this->assertEquals($result, $groups);
    }

    /**
     * @expectedException \Steam\Api\Exception\UserNotExists
     */
    public function testGetUserGroupListException()
    {
        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());

        $user = new User();
        $user->setAdapter($mock);
        $user->getUserGroupList('%%%soft-kitty-bad-kitty-ball-of-not-controlled-anger-with-dude%%%');
    }

    public function testResolveVanityUrl()
    {
        $result = array(
            'response' => array(
                array(
                    'success' => 1,
                    'steamid ' => 9568333,
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
        $steamId = $user->resolveVanityUrl('test');
        $this->assertEquals($result, $steamId);
    }

}