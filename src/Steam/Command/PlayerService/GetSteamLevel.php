<?php

namespace Steam\Command\PlayerService;

class GetSteamLevel 
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @param int $steamId
     */
    public function __construct($steamId)
    {
        $this->steamId = $steamId;
    }

    public function getInterface()
    {
        return 'IPlayerService';
    }

    public function getMethod()
    {
        return 'GetSteamLevel';
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
            'steamid' => $this->steamId,
        ];
    }
} 