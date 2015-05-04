<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetNumberOfCurrentPlayers implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @param int $appId
     */
    public function __construct($appId)
    {
        $this->appId = $appId;
    }

    public function getInterface()
    {
        return 'ISteamUserStats';
    }

    public function getMethod()
    {
        return 'GetNumberOfCurrentPlayers';
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
            'appid' => $this->appId,
        ];
    }
}