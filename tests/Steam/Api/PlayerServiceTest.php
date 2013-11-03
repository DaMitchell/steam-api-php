<?php

namespace Steam\Api;

use Steam\SteamTestCase;

class PlayerServiceTest extends SteamTestCase
{
    public function testRecentlyPlayedGamesIsCalledWithCorrectParamsDefaultCount()
    {
        $steamId = 2380472340;

        $url = 'IPlayerService/GetRecentlyPlayedGames/v1';
        $params = array(
            'steamid' => $steamId,
            'count' => 10
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getRecentlyPlayedGames($steamId));
    }

    public function testRecentlyPlayedGamesIsCalledWithCorrectParamsSpecificCount()
    {
        $steamId = 2380472340;
        $count = 5;

        $url = 'IPlayerService/GetRecentlyPlayedGames/v1';
        $params = array(
            'steamid' => $steamId,
            'count' => $count,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getRecentlyPlayedGames($steamId, $count));
    }

    public function testGetOwnedGamesIsCalledWithCorrectParamsDefaultValues()
    {
        $steamId = 2380472340;

        $url = 'IPlayerService/GetOwnedGames/v1';
        $params = array(
            'steamid' => $steamId,
            'include_appinfo' => false,
            'include_played_free_games' => false,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getOwnedGames($steamId));
    }

    public function testGetOwnedGamesIsCalledWithCorrectParamsSpecificValues()
    {
        $steamId = 2380472340;
        $includeAppInfo = true;
        $includePlayedFreeGames = true;

        $url = 'IPlayerService/GetOwnedGames/v1';
        $params = array(
            'steamid' => $steamId,
            'include_appinfo' => $includeAppInfo,
            'include_played_free_games' => $includePlayedFreeGames,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getOwnedGames($steamId, $includeAppInfo, $includePlayedFreeGames));
    }

    public function testGetSteamLevelIsCalledWithCorrectParams()
    {
        $steamId = 2380472340;

        $url = 'IPlayerService/GetSteamLevel/v1';
        $params = array(
            'steamid' => $steamId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getSteamLevel($steamId));
    }

    public function testGetBadgesIsCalledWithCorrectParams()
    {
        $steamId = 2380472340;

        $url = 'IPlayerService/GetBadges/v1';
        $params = array(
            'steamid' => $steamId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getBadges($steamId));
    }

    public function testGetCommunityBadgeProgressIsCalledWithCorrectParams()
    {
        $steamId = 2380472340;
        $badgeId = 234;

        $url = 'IPlayerService/GetCommunityBadgeProgress/v1';
        $params = array(
            'steamid' => $steamId,
            'badgeid' => $badgeId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params)
            ->will($this->returnValue($result));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $playerService = new PlayerService();
        $playerService->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $playerService->getCommunityBadgeProgress($steamId, $badgeId));
    }
}
