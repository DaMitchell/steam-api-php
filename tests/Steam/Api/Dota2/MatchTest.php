<?php

namespace Steam\Api\Dota2;

use Steam\Api\Dota2\Match\HistoryConfiguration;
use Steam\SteamTestCase;

class MatchTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testAnExceptionIsThrownIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);
        $match->getLeagueListing();
    }

    public function testGetLeagueListingIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IDOTA2Match_570/GetLeagueListing/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getLeagueListing());
    }

    public function testGetLiveLeagueGamesIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IDOTA2Match_570/GetLiveLeagueGames/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getLiveLeagueGames());
    }

    public function testGetMatchDetailsGetCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $matchId = 3212312;

        $url = 'IDOTA2Match_570/GetMatchDetails/v1';
        $params = array(
            'match_id' => $matchId
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getMatchDetails($matchId));
    }

    public function testGetMatchHistoryGetCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $matchHistory = new HistoryConfiguration(array(
            HistoryConfiguration::HERO_ID => 10,
        ));

        $url = 'IDOTA2Match_570/GetMatchHistory/v1';
        $params = array(
            'hero_id' => 10
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getMatchHistory($matchHistory));
    }

    public function testGetMatchHistoryBySequenceNumCalledWithCorrectParamsNothingPassedIn()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IDOTA2Match_570/GetMatchHistoryBySequenceNum/v1';
        $params = array();

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getMatchHistoryBySequenceNum());
    }

    public function testGetMatchHistoryBySequenceNumCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $startAtMatchSeqNumber = 123213;

        $url = 'IDOTA2Match_570/GetMatchHistoryBySequenceNum/v1';
        $params = array(
            'start_at_match_seq_num' => $startAtMatchSeqNumber,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getMatchHistoryBySequenceNum($startAtMatchSeqNumber));
    }

    public function testGetMatchHistoryBySequenceNumCalledWithCorrectParamsAllParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $startAtMatchSeqNumber = 123213;
        $matchesRequested = 5;

        $url = 'IDOTA2Match_570/GetMatchHistoryBySequenceNum/v1';
        $params = array(
            'start_at_match_seq_num' => $startAtMatchSeqNumber,
            'matches_requested' => $matchesRequested,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getMatchHistoryBySequenceNum($startAtMatchSeqNumber, $matchesRequested));
    }

    public function testGetScheduledLeagueGamesCalledWithCorrectParamsNothingPassedIn()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IDOTA2Match_570/GetScheduledLeagueGames/v1';
        $params = array();

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getScheduledLeagueGames());
    }

    public function testGetScheduledLeagueGamesCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $dateMin = 123213;

        $url = 'IDOTA2Match_570/GetScheduledLeagueGames/v1';
        $params = array(
            'date_min' => $dateMin,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getScheduledLeagueGames($dateMin));
    }

    public function testGetScheduledLeagueGamesCalledWithCorrectParamsAllParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $dateMin = 123213;
        $dateMax = 345345;

        $url = 'IDOTA2Match_570/GetScheduledLeagueGames/v1';
        $params = array(
            'date_min' => $dateMin,
            'date_max' => $dateMax,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getScheduledLeagueGames($dateMin, $dateMax));
    }

    public function testGetTeamInfoByTeamIDCalledWithCorrectParamsNothingPassedIn()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IDOTA2Match_570/GetTeamInfoByTeamID/v1';
        $params = array();

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getTeamInfoByTeamId());
    }

    public function testGetTeamInfoByTeamIdCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $startAtTeamId = 123;

        $url = 'IDOTA2Match_570/GetTeamInfoByTeamID/v1';
        $params = array(
            'start_at_team_id' => $startAtTeamId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getTeamInfoByTeamId($startAtTeamId));
    }

    public function testGetTeamInfoByTeamIdCalledWithCorrectParamsAllParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $startAtTeamId = 123;
        $teamsRequested = 5;

        $url = 'IDOTA2Match_570/GetTeamInfoByTeamID/v1';
        $params = array(
            'start_at_team_id' => $startAtTeamId,
            'teams_requested' => $teamsRequested,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getTeamInfoByTeamId($startAtTeamId, $teamsRequested));
    }

    public function testGetTournamentPlayerStatsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $accountId = 123;

        $url = 'IDOTA2Match_570/GetTournamentPlayerStats/v1';
        $params = array(
            'account_id' => $accountId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getTournamentPlayerStats($accountId));
    }

    public function testGetTournamentPlayerStatsCalledWithCorrectParamsAllParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $accountId = 123;
        $leagueId = 10;
        $heroId = 10;
        $timeFrame = 23123;
        $matchId = 2342342;

        $url = 'IDOTA2Match_570/GetTournamentPlayerStats/v1';
        $params = array(
            'account_id' => $accountId,
            'league_id' => $leagueId,
            'hero_id' => $heroId,
            'time_frame' => $timeFrame,
            'match_id' => $matchId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Match();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getTournamentPlayerStats($accountId, $leagueId, $heroId, $timeFrame, $matchId));
    }
}
