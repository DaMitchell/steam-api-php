<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class GetUserGroupList implements CommandInterface
{
    /**
     * @var array
     */
    protected $steamId;

    /**
     * @param array $steamId
     */
    public function __construct($steamId)
    {
        $this->steamId = $steamId;
    }

    public function getInterface()
    {
        return 'ISteamUser';
    }

    public function getMethod()
    {
        return 'GetUserGroupList';
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