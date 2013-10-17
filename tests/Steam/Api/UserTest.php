<?php
namespace Steam;

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Api\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFriendList()
    {
        $adapter = new Guzzle();
        $adapter->setSerializer(SerializerBuilder::create()->build());
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C'
        );
        $config = new Configuration($options);

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
        $adapter = new Guzzle();
        $adapter->setSerializer(SerializerBuilder::create()->build());
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
            'appId' => \Steam\Apps::DOTA_2_ID
        );
        $config = new Configuration($options);

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