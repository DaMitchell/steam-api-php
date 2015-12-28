<?php

namespace Steam\Command\Dota2\StreamSystem;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetBroadcasterInfo implements CommandInterface
{
    /**
     * @var int
     */
    protected $broadcasterStreamId;

    /**
     * @var int
     */
    protected $leagueId;

    /**
     * @param int $broadcasterStreamId
     * @param int $leagueId
     */
    public function __construct($broadcasterStreamId, $leagueId = null)
    {
        $this->broadcasterStreamId = (int) $broadcasterStreamId;

        if(!is_null($leagueId)) {
            $this->setLeagueId($leagueId);
        }
    }

    public function setLeagueId($leagueId)
    {
        $this->leagueId = (int) $leagueId;
    }

    public function getInterface()
    {
        return 'IDOTA2StreamSystem_570';
    }

    public function getMethod()
    {
        return 'GetBroadcasterInfo';
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
            'broadcaster_steam_id' => $this->broadcasterStreamId,
        ];

        empty($this->leagueId) ?: $params['league_id'] = $this->leagueId;

        return $params;
    }
} 