<?php

namespace Steam\Api;
 
use Steam\Steam;

class WebApiUtil extends Steam
{
    const ENDPOINT_BASE = 'ISteamWebAPIUtil/';

    public function getServerInfo()
    {
        $url = self::ENDPOINT_BASE . 'GetServerInfo/v0001';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    public function getSupportedApiList()
    {
        $url = self::ENDPOINT_BASE . 'GetSupportedAPIList/v0001';

        return $this->getAdapter()->request($url)->getParsedBody();
    }
}
