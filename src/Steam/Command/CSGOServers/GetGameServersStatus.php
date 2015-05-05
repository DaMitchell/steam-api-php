<?php

namespace Steam\Command\CSGOServers;

use Steam\Command\CommandInterface;

class GetGameServersStatus implements CommandInterface
{
    public function getInterface()
    {
        return 'ICSGOServers_730';
    }

    public function getMethod()
    {
        return 'GetGameServersStatus';
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