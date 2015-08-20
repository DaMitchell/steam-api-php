<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetTeamInfoByTeamId implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $startAtTeamId;

    /**
     * @var int
     */
    protected $teamsRequested;

    /**
     * @param int $startAtTeamId
     *
     * @return self
     */
    public function setStartAtTeamId($startAtTeamId)
    {
        $this->startAtTeamId = $startAtTeamId;
        return $this;
    }

    /**
     * @param int $teamsRequested
     *
     * @return self
     */
    public function setTeamsRequested($teamsRequested)
    {
        $this->teamsRequested = $teamsRequested;
        return $this;
    }

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetTeamInfoByTeamID';
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

        empty($this->startAtTeamId) ?: $params['start_at_team_id'] = $this->startAtTeamId;
        empty($this->teamsRequested) ?: $params['teams_requested'] = $this->teamsRequested;

        return $params;
    }
} 