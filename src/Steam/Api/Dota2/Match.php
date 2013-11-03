<?php

namespace Steam\Api\Dota2;

use Steam\Api\Dota2\Match\HistoryConfiguration;
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Match extends Steam
{
    const ENDPOINT_BASE = 'IDOTA2Match_{id}/';

    /**
     * @var string
     */
    protected $_endpoint = null;

    /**
     * @return string
     * @throws InsufficientParameters
     */
    protected function getEndPoint()
    {
        if(is_null($this->_endpoint))
        {
            $appId = $this->getAdapter()->getConfig()->getAppId();

            if(empty($appId))
            {
                throw new InsufficientParameters('You need to set a appId in the config to use this method');
            }

            $this->_endpoint = str_replace('{id}', $appId, self::ENDPOINT_BASE);
        }

        return $this->_endpoint;
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetLeagueListing
     *
     * @return array
     */
    public function getLeagueListing()
    {
        $url = $this->getEndPoint() . 'GetLeagueListing/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetLiveLeagueGames
     *
     * @return array
     */
    public function getLiveLeagueGames()
    {
        $url = $this->getEndPoint() . 'GetLiveLeagueGames/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetMatchDetails
     *
     * @param int $matchId
     *
     * @return array
     */
    public function getMatchDetails($matchId)
    {
        $params = array(
            'match_id' => $matchId
        );

        $url = $this->getEndPoint() . 'GetMatchDetails/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetMatchHistory
     *
     * @param HistoryConfiguration $configuration
     *
     * @return array
     */
    public function getMatchHistory(HistoryConfiguration $configuration)
    {
        $params = array();

        foreach($configuration->getOptions() as $key => $value)
        {
            if(!is_null($value))
            {
                $params[$key] = $value;
            }
        }

        $url = $this->getEndPoint() . 'GetMatchHistory/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetMatchHistoryBySequenceNum
     *
     * @param int $startAtMatchSeqNumber
     * @param int $matchesRequested
     *
     * @return array
     */
    public function getMatchHistoryBySequenceNum($startAtMatchSeqNumber = null, $matchesRequested = null)
    {
        $params = array();

        if(!is_null($startAtMatchSeqNumber))
        {
            $params['start_at_match_seq_num'] = $startAtMatchSeqNumber;
        }

        if(!is_null($matchesRequested))
        {
            $params['matches_requested'] = $matchesRequested;
        }

        $url = $this->getEndPoint() . 'GetMatchHistoryBySequenceNum/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetScheduledLeagueGames
     *
     * @param int $dateMin
     * @param int $dateMax
     *
     * @return array
     */
    public function getScheduledLeagueGames($dateMin = null, $dateMax = null)
    {
        $params = array();

        if(!is_null($dateMin))
        {
            $params['date_min'] = $dateMin;
        }

        if(!is_null($dateMax))
        {
            $params['date_max'] = $dateMax;
        }

        $url = $this->getEndPoint() . 'GetScheduledLeagueGames/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetTeamInfoByTeamID
     *
     * @param int $startAtTeamId
     * @param int $teamsRequested
     *
     * @return array
     */
    public function getTeamInfoByTeamId($startAtTeamId = null, $teamsRequested = null)
    {
        $params = array();

        if(!is_null($startAtTeamId))
        {
            $params['start_at_team_id'] = $startAtTeamId;
        }

        if(!is_null($teamsRequested))
        {
            $params['teams_requested'] = $teamsRequested;
        }

        $url = $this->getEndPoint() . 'GetTeamInfoByTeamID/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetTournamentPlayerStats
     *
     * @param string $accountId
     * @param string $leagueId
     * @param string $heroId
     * @param string $timeFrame
     * @param string $matchId
     *
     * @return array
     */
    public function getTournamentPlayerStats($accountId, $leagueId = null, $heroId = null, $timeFrame = null, $matchId = null)
    {
        $params = array(
            'account_id' => $accountId,
        );

        if(!is_null($leagueId))
        {
            $params['league_id'] = $leagueId;
        }

        if(!is_null($heroId))
        {
            $params['hero_id'] = $heroId;
        }

        if(!is_null($timeFrame))
        {
            $params['time_frame'] = $timeFrame;
        }

        if(!is_null($matchId))
        {
            $params['match_id'] = $matchId;
        }

        $url = $this->getEndPoint() . 'GetTournamentPlayerStats/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}
