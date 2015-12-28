<?php

namespace Steam\Command\GameServersService;
 
use Steam\Command\CommandInterface;

class GetServerList implements CommandInterface
{
    public function getInterface()
    {
        return 'IGameServersService';
    }

    public function getMethod()
    {
        return 'GetServerList';
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
        return [];
    }
}
