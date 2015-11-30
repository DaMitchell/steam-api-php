<?php

namespace Steam\Command\Dota2\Fantasy;
 
use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetProPlayerList implements CommandInterface
{
    public function getInterface()
    {
        return 'IDOTA2Fantasy_570';
    }

    public function getMethod()
    {
        return 'GetProPlayerList';
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
