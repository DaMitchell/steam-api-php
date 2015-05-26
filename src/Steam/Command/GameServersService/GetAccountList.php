<?php

namespace Steam\Command\GameServersService;
 
use Steam\Command\CommandInterface;

class GetAccountList implements CommandInterface
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
        $this->steamId = (int) $steamId;
    }

    public function getInterface()
    {
        return 'IGameServersService';
    }

    public function getMethod()
    {
        return 'GetAccountList';
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
