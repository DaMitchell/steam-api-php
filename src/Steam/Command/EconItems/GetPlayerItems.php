<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetPlayerItems implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var int
     */
    protected $steamId;

    /**
     * @param int $appId
     * @param int $steamId
     */
    public function __construct($appId, $steamId)
    {
        $this->appId = $appId;
        $this->steamId = $steamId;
    }

    public function getInterface()
    {
        return 'IEconItems_' . $this->appId;
    }

    public function getMethod()
    {
        return 'GetPlayerItems';
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