<?php
namespace Steam\Api;

use Steam\Api\User;
use Steam\SteamTestCase;

class UserTest extends SteamTestCase
{
    public function testResolvingUrls()
    {
        $result = array(
            'request' => array(),
        );

        $vanityUrl = 'Vestri';

        $this->_adapterMock->expects($this->once())->method('request')->with('ISteamUser/ResolveVanityURL/v0001', array(
            'vanityurl' => $vanityUrl
        ));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $user->resolveVanityUrl($vanityUrl));
    }

    /**
     * @expectedException \Steam\Api\Exception\NoSuchUser
     */
    public function testGetFriendListWithNoRelationshipNoSuchUserExceptionThrown()
    {
        $result = array(
            'request' => array(),
        );

        $steamId = 'Vestri';

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 0))
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $user->getFriendList($steamId);
    }

    public function testGetFriendListWithNoRelationshipCalledWithCorrectParams()
    {
        $result = array(
            'request' => array(),
        );

        $steamIdString = 'Vestri';
        $steamIdNumber = 123123123;

        $this->_adapterMock->expects($this->exactly(2))->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 1, 'steamid' => $steamIdNumber)),
            $result
        ));

        $this->_adapterMock->expects($this->at(2))->method('request')->with('ISteamUser/GetFriendList/v0001', array(
            'steamid' => $steamIdNumber,
            'relationship' => 'all'
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $user->getFriendList($steamIdString, 'all'));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetPlayerBansExpectExceptionWithEmptyArrayOfIds()
    {
        $user = new User();
        $user->getPlayerBans(array());
    }

    /**
     * @expectedException \Steam\Api\Exception\NoSuchUser
     */
    public function testGetPlayerBansWhenResolvingSteamIdsAndTheyAreInvalid()
    {
        $steamIds = array(
            'Vestri'
        );

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 0))
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $user->getPlayerBans($steamIds);
    }

    public function testGetPLayerBansCalledWithCorrectParams()
    {
        $result = array(
            'request' => array(),
        );

        $steamIds = array(
            'Vestri',
            'Visio',
        );

        $steamIdNumber1 = 123123123;
        $steamIdNumber2 = 345345345;

        $this->_adapterMock->expects($this->exactly(3))->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 1, 'steamid' => $steamIdNumber1)),
            array('response' => array('success' => 1, 'steamid' => $steamIdNumber2)),
            $result
        ));

        $this->_adapterMock->expects($this->at(4))->method('request')->with('ISteamUser/GetPlayerBans/v1', array(
            'steamids' => $steamIdNumber1 . ',' . $steamIdNumber2,
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $user->getPlayerBans($steamIds));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetPlayerSummariesExpectExceptionWithEmptyArrayOfIds()
    {
        $user = new User();
        $user->getPlayerSummaries(array());
    }

    /**
     * @expectedException \Steam\Api\Exception\NoSuchUser
     */
    public function testGetPlayerSummariesWhenResolvingSteamIdsAndTheyAreInvalid()
    {
        $steamIds = array(
            'Vestri'
        );

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 0))
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $user->getPlayerSummaries($steamIds);
    }

    public function testGetPlayerSummariesCalledWithCorrectParams()
    {
        $result = array(
            'request' => array(),
        );

        $steamIds = array(
            'Vestri',
            'Visio',
        );

        $steamIdNumber1 = 123123123;
        $steamIdNumber2 = 345345345;

        $this->_adapterMock->expects($this->exactly(3))->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 1, 'steamid' => $steamIdNumber1)),
            array('response' => array('success' => 1, 'steamid' => $steamIdNumber2)),
            $result
        ));

        $this->_adapterMock->expects($this->at(4))->method('request')->with('ISteamUser/GetPlayerSummaries/v0002', array(
            'steamids' => $steamIdNumber1 . ',' . $steamIdNumber2,
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $user->getPlayerSummaries($steamIds));
    }

    /**
     * @expectedException \Steam\Api\Exception\NoSuchUser
     */
    public function testGetUserGroupListWithNoRelationshipNoSuchUserExceptionThrown()
    {
        $steamId = 'Vestri';

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 0))
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $user->getUserGroupList($steamId);
    }

    public function testGetUserGroupListWithNoRelationshipCalledWithCorrectParams()
    {
        $result = array(
            'request' => array(),
        );

        $steamIdString = 'Vestri';
        $steamIdNumber = 123123123;

        $this->_adapterMock->expects($this->exactly(2))->method('getParsedBody')->will($this->onConsecutiveCalls(
            array('response' => array('success' => 1, 'steamid' => $steamIdNumber)),
            $result
        ));

        $this->_adapterMock->expects($this->at(2))->method('request')->with('ISteamUser/GetUserGroupList/v1', array(
            'steamid' => $steamIdNumber
        ));

        $user = new User();
        $user->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $user->getUserGroupList($steamIdString));
    }
}