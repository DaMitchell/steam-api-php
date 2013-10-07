<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;
use Steam\SteamInterface;

class Apps extends SteamInterface
{
    const ENDPOINT_BASE = 'ISteamApps/';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetAppList
     *
     * @return array
     */
    public function getAppList()
    {
        $url = self::ENDPOINT_BASE . 'GetAppList/v2/';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetServersAtAddress
     *
     * @throws Exception\ApiNotImplementedException
     */
    public function getServerAtAddress()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented'));
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/UpToDateCheck
     *
     * @throws Exception\ApiNotImplementedException
     */
    public function upToDateCheck()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented'));
    }
}