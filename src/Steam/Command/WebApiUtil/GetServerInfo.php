<?php

namespace Steam\Command\WebApiUtil;

use Steam\Command\CommandInterface;

class GetServerInfo implements CommandInterface
{
    public function getInterface()
    {
        return 'ISteamWebAPIUtil';
    }

    public function getMethod()
    {
        return 'GetServerInfo';
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