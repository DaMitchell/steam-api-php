<?php

namespace Steam\Command\Apps;

use Steam\Command\CommandInterface;

class UpToDateCheck implements CommandInterface
{
    /**
     * AppID of game.
     *
     * @var int
     */
    protected $appId;

    /**
     * The installed version of the game.
     *
     * @var int
     */
    protected $version;

    /**
     * @param int $appId
     * @param int $version
     */
    public function __construct($appId, $version)
    {
        $this->appId = (int) $appId;
        $this->version = (int) $version;
    }

    public function getInterface()
    {
        return 'ISteamApps';
    }

    public function getMethod()
    {
        return 'UpToDateCheck';
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
            'appId' => $this->appId,
            'version' => $this->version,
        ];
    }
}