<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Economy extends Steam
{
    const ENDPOINT_BASE = 'ISteamEconomy/';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetAssetClassInfo
     *
     * @param array $classIds
     * @param string $language
     *
     * @return mixed
     * @throws Exception\InsufficientParameters
     */
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

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetAssetPrices
     *
     * @param string $language
     * @param null $currency
     *
     * @return mixed
     * @throws Exception\InsufficientParameters
     */
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