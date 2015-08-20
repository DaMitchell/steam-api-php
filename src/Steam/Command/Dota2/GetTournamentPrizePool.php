<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetTournamentPrizePool implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $leagueId;

    /**
     * @param int $leagueId
     */
    public function __construct($leagueId)
    {
        $this->leagueId = (int) $leagueId;
    }

    public function getInterface()
    {
        return 'IEconDOTA2_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetTournamentPrizePool';
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
        return [
            'leagueid' => $this->leagueId,
        ];
    }
} 