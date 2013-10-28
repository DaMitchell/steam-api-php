<?php

namespace Steam\Api\Econ;
 
use Steam\Api\Exception\ApiNotImplementedException;
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Promos extends Steam
{
    const ENDPOINT_BASE = 'IEconItems_{id}/';

    /**
     * @var string
     */
    protected $_endpoint = null;

    /**
     * @return string
     * @throws InsufficientParameters
     */
    protected function getEndPoint()
    {
        if(is_null($this->_endpoint))
        {
            $appId = $this->getAdapter()->getConfig()->getAppId();

            if(empty($appId))
            {
                throw new InsufficientParameters('You need to set a appId in the config to use this method');
            }

            $this->_endpoint = str_replace(self::ENDPOINT_BASE, '{id}', $appId);
        }

        return $this->_endpoint;
    }

    /**
     * @param int $steamId
     * @param int $promoId
     *
     * @return mixed
     */
    public function getItemId($steamId, $promoId)
    {
        $params = array(
            'steamid' => $steamId,
            'PromoID' => $promoId,
        );

        $url = $this->getEndPoint() . 'GetItemID/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @param int $steamId
     * @param int $promoId
     *
     * @throws ApiNotImplementedException
     */
    public function grantItem($steamId, $promoId)
    {
        throw new ApiNotImplementedException('Not implementing the POST method calls for this release');
    }
}
