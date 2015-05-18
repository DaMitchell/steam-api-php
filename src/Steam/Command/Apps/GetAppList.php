<?php

namespace Steam\Command\Apps;

use Steam\Command\CommandInterface;

class GetAppList implements CommandInterface
{
    public function getInterface()
    {
        return 'ISteamApps';
    }

    public function getMethod()
    {
        return 'GetAppList';
    }

    public function getVersion()
    {
        return 'v2';
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