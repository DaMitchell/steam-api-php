<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class News extends Steam
{
    const ENDPOINT_BASE = 'ISteamNews/';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetNewsForApp
     *
     * @param int $count
     * @param int $maxLength
     * @param int $endDate
     *
     * @return array
     * @throws InsufficientParameters
     */
    public function getNewsForApp($count = null, $maxLength = null, $endDate = null)
    {
        $appId = $this->getAdapter()->getConfig()->getAppId();

        if(empty($appId))
        {
            throw new InsufficientParameters('You need to set a appId in the config to use this method');
        }

        $params = array(
            'appid' => $appId,
        );

        if(!is_null($count))
        {
            $params['count'] = $count;
        }

        if(!is_null($maxLength))
        {
            $params['maxlength'] = $maxLength;
        }

        if(!is_null($endDate))
        {
            $params['enddata'] = $endDate;
        }

        $url = self::ENDPOINT_BASE . 'GetNewsForApp/v0002';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}