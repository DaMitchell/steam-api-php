<?php

namespace Steam\Command\Dota2\MatchStats;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetRealtimeStats implements CommandInterface
{
    /**
     * @var int
     */
    protected $serverSteamId;

    /**
     * @param int $serverSteamId
     */
    public function __construct($serverSteamId)
    {
        $this->serverSteamId = (int) $serverSteamId;
    }

    public function getInterface()
    {
        return 'IDOTA2MatchStats_570';
    }

    public function getMethod()
    {
        return 'GetRealtimeStats';
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
            'server_steam_id' => $this->serverSteamId,
        ];
    }
} 