<?php

namespace Steam\Command\TeamFortressItems;

use Steam\Command\CommandInterface;

class GetGoldenWrenches implements CommandInterface
{
    public function getInterface()
    {
        return 'ITFItems_440';
    }

    public function getMethod()
    {
        return 'GetGoldenWrenches';
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