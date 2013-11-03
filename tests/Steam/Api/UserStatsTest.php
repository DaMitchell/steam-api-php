<?php

namespace Steam\Api;
 
use Steam\SteamTestCase;

class UserStatsTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetGlobalAchievementPercentagesForAppThrowsExceptionWhenNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);
        $userStats->getGlobalAchievementPercentagesForApp();
    }

    public function testGetGlobalAchievementPercentagesForAppIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'ISteamUserStats/GetGlobalAchievementPercentagesForApp/v0002';
        $params = array(
            'gameid' => 570,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $userStats->getGlobalAchievementPercentagesForApp());
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetGlobalStatsForGameThrowsExceptionWhenNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);
        $userStats->getGlobalStatsForGame(2, array());
    }

    public function testGetGlobalStatsForGameIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $count = 5;
        $names = array(
            'test',
        );
        $startDate = 13123123;
        $endDate = 345345345;

        $url = 'ISteamUserStats/GetGlobalStatsForGame/v0001';
        $params = array(
            'appid' => 570,
            'count' => $count,
            'name' => $names,
            'startdate' => $startDate,
            'enddate' => $endDate,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $userStats->getGlobalStatsForGame($count, $names, $startDate, $endDate));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetNumberOfCurrentPlayersThrowsExceptionWhenNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);
        $userStats->getNumberOfCurrentPlayers();
    }

    public function testGetNumberOfCurrentPlayersIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'ISteamUserStats/GetNumberOfCurrentPlayers/v1';
        $params = array(
            'appid' => 570,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $userStats->getNumberOfCurrentPlayers());
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetPlayerAchievementsThrowsExceptionWhenNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);
        $userStats->getPlayerAchievements(234234234);
    }

    public function testGetPlayerAchievementsIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $steamId = 230984209834;

        $url = 'ISteamUserStats/GetPlayerAchievements/v1';
        $params = array(
            'appid' => 570,
            'steamid' => $steamId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $userStats->getPlayerAchievements($steamId));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetSchemaForGameThrowsExceptionWhenNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);
        $userStats->getSchemaForGame();
    }

    public function testGetSchemaForGameIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'ISteamUserStats/GetSchemaForGame/v2';
        $params = array(
            'appid' => 570,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $userStats->getSchemaForGame());
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetUserStatsForGameThrowsExceptionWhenNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);
        $userStats->getUserStatsForGame(234234);
    }

    public function testGetUserStatsForGameIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $steamId = 230984209834;

        $url = 'ISteamUserStats/GetUserStatsForGame/v2';
        $params = array(
            'appid' => 570,
            'steamid' => $steamId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $userStats = new UserStats();
        $userStats->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $userStats->getUserStatsForGame($steamId));
    }
}
