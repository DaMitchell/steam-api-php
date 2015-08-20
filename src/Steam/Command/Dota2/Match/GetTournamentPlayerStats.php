<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetTournamentPlayerStats implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $leagueId;

    /**
     * @var string
     */
    protected $heroId;

    /**
     * @var int
     */
    protected $matchId;

    /**
     * @param string $accountId
     */
    public function __construct($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param string $leagueId
     *
     * @return self
     */
    public function setLeagueId($leagueId)
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @param string $heroId
     *
     * @return self
     */
    public function setHeroId($heroId)
    {
        $this->heroId = $heroId;
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
        return 'GetTournamentPlayerStats';
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
        $params = [
            'account_id' => $this->accountId,
        ];

        empty($this->leagueId) ?: $params['league_id'] = $this->leagueId;
        empty($this->heroId) ?: $params['hero_id'] = $this->heroId;
        empty($this->matchId) ?: $params['match_id'] = $this->matchId;

        return $params;
    }
} 