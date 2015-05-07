<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class IsPlayingSharedGame implements CommandInterface
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
        return 'IPlayerService';
    }

    public function getMethod()
    {
        return 'IsPlayingSharedGame';
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
            'appid_playing' => $this->appId,
        ];
    }
} 