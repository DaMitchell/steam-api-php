<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class GetPlayerSummaries implements CommandInterface
{
    /**
     * @var array
     */
    protected $steamId;

    /**
     * @param array $steamId
     */
    public function __construct(array $steamId)
    {
        $this->steamId = $steamId;
    }

    public function getInterface()
    {
        return 'ISteamUser';
    }

    public function getMethod()
    {
        return 'GetPlayerSummaries';
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
            'steamids' => implode(',', $this->steamId)
        ];
    }
} 