<?php

namespace Steam\Command\GameServersService;
 
use Steam\Command\CommandInterface;

class GetServerSteamIDsByIP implements CommandInterface
{
    /**
     * @var string
     */
    protected $serverIp;

    /**
     * @param string $serverIp
     */
    public function __construct($serverIp)
    {
        $this->serverIp = $serverIp;
    }

    public function getInterface()
    {
        return 'IGameServersService';
    }

    public function getMethod()
    {
        return 'GetServerSteamIDsByIP';
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
            'server_ips' => $this->serverIp,
        ];
    }
}
