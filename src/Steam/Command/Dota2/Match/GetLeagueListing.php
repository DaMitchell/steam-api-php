<?php

namespace Steam\Command\Dota2\Match;

use Steam\Traits\Dota2CommandTrait;

class GetLeagueListing
{
    use Dota2CommandTrait;

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetLeagueListing';
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