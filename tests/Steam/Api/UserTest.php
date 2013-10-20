<?php
namespace Steam;

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Api\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFriendList()
    {
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C'
        );
        $config = new Configuration($options);
        $adapter = new Guzzle($config);
        $adapter->setSerializer(SerializerBuilder::create()->build());

        $user = new User($config);
        $user->setAdapter($adapter);
        $friendList = $user->getFriendList('fr3nzzy');
        $this->assertArrayHasKey('friendslist', $friendList);
    }

    /**
     * @expectedException \Steam\Api\Exception\UserNotExists
     */
    public function testGetFriendListException()
    {
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
        );
        $config = new Configuration($options);
        $adapter = new Guzzle($config);
        $adapter->setSerializer(SerializerBuilder::create()->build());

        $user = new User($config);
        $user->setAdapter($adapter);
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