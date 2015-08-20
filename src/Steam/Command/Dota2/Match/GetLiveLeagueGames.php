<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetLiveLeagueGames implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $leagueId;

    /**
     * @var int
     */
    protected $matchId;

    /**
     * @param int $leagueId
     *
     * @return self
     */
    public function setLeagueId($leagueId)
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @param int $matchId
     *
     * @return self
     */
    public function setMatchId($matchId)
    {
        $this->matchId = $matchId;
        return $this;
    }

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetLiveLeagueGames';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        $params = [];

        empty($this->leagueId) ?: $params['league_id'] = $this->leagueId;
        empty($this->matchId) ?: $params['match_id'] = $this->matchId;

        return $params;
    }
} 