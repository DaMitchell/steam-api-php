<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Economy extends Steam
{
    const ENDPOINT_BASE = 'ISteamEconomy/';

    public function getAssetClassInfo(array $classIds = array(), $language = 'en')
    {
        $appId = $this->getAdapter()->getConfig()->getAppId();

        if(empty($appId))
        {
            throw new InsufficientParameters('You need to set a appId in the config to use this method');
        }

        $params = array(
            'appid' => $appId,
            'language' => $language,
            'class_count' => count($classIds),
        );

        $i = 0;

        foreach($classIds as $classId)
        {
            $params['classid' . $i] = $classId;
            $i++;
        }

        $url = self::ENDPOINT_BASE . 'GetAssetClassInfo/v0001';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    public function getAssetPrices($language = 'en', $currency = null)
    {
        $appId = $this->getAdapter()->getConfig()->getAppId();

        if(empty($appId))
        {
            throw new InsufficientParameters('You need to set a appId in the config to use this method');
        }

        $params = array(
            'appid' => $appId,
            'language' => $language,
        );

        if(!is_null($currency))
        {
            $params['currency'] = $currency;
        }

        $url = self::ENDPOINT_BASE . 'GetAssetPrices/v0001';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}