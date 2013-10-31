<?php

namespace Steam\Api\Dota2;
 
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

            $this->_endpoint = str_replace(self::ENDPOINT_BASE, '{id}', $appId);
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

        $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetMatchHistory
     *
     * @return array
     */
    public function getMatchHistory()
    {
        $url = $this->getEndPoint() . 'GetMatchHistory/v1';

    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetMatchHistoryBySequenceNum
     *
     * @param int $startAtMatchSeqNumber
     * @param $matchesRequested
     *
     * @return array
     */
    public function getMatchHistoryBySequenceNum($startAtMatchSeqNumber, $matchesRequested)
    {
        $params = array(
            'start_at_match_seq_num' => $startAtMatchSeqNumber,
            'matches_requested' => $matchesRequested
        );

        $url = $this->getEndPoint() . 'GetMatchHistoryBySequenceNum/v1';

        $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetScheduledLeagueGames
     */
    public function getScheduledLeagueGames()
    {
        $url = $this->getEndPoint() . 'GetScheduledLeagueGames/v1';

    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetTeamInfoByTeamID
     */
    public function getTeamInfoByTeamId()
    {
        $url = $this->getEndPoint() . 'GetTeamInfoByTeamID/v1';

    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetTournamentPlayerStats
     */
    public function GetTournamentPlayerStats()
    {
        $url = $this->getEndPoint() . 'GetTournamentPlayerStats/v1';

    }
}
