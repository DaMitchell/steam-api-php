<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetUserStatsForGame implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var int
     */
    protected $appId;

    /**
     * @param int $steamId
     * @param int $appId
     */
    public function __construct($steamId, $appId)
    {
        $this->steamId = $steamId;
        $this->appId = $appId;
    }


    public function getInterface()
    {
        return 'ISteamUserStats';
    }

    public function getMethod()
    {
        return 'GetUserStatsForGame';
    }

    public function getVersion()
    {
        return 'v2';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        return [
            'steamid' => $this->steamId,
            'appid' => $this->appId,
        ];
    }
} 