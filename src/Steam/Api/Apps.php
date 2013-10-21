<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Apps extends Steam
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
     * @link http://wiki.teamfortress.com/wiki/WebAPI/UpToDateCheck
     *
     * @param int $version
     *
     * @return array
     * @throws Exception\InsufficientParameters
     */
    public function upToDateCheck($version)
    {
        $appId = $this->getAdapter()->getConfig()->getAppId();

        if(empty($appId))
        {
            throw new InsufficientParameters('You need to set a appId in the config to use this method');
        }

        $params = array(
            'appid' => $appId,
            'version' => $version
        );

        $url = self::ENDPOINT_BASE . 'UpToDateCheck/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}