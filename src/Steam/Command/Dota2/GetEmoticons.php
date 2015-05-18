<?php

namespace Steam\Command\Dota2;

class GetEmoticons
{
    public function getInterface()
    {
        return 'IEconDOTA2_570';
    }

    public function getMethod()
    {
        return 'GetEmoticons';
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