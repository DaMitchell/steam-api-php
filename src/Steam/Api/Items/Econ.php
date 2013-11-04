<?php

namespace Steam\Api\Items;
 
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Econ extends Steam
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

            $this->_endpoint = str_replace('{id}', $appId, self::ENDPOINT_BASE);
        }

        return $this->_endpoint;
    }

    /**
     * @param int $steamId
     *
     * @return array
     */
    public function getPlayerItems($steamId)
    {
        $params = array(
            'steamid' => $steamId
        );

        $url = $this->getEndPoint() . 'GetPlayerItems/v0001';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @return array
     */
    public function getSchema()
    {
        $url = $this->getEndPoint() . 'GetSchema/v0001';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @return array
     */
    public function getSchemaUrl()
    {
        $url = $this->getEndPoint() . 'GetSchemaURL/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @return array
     */
    public function getStoreMetadata()
    {
        $url = $this->getEndPoint() . 'GetStoreMetaData/v0001';

        return $this->getAdapter()->request($url)->getParsedBody();
    }


    public function getStoreStatus()
    {
        $url = $this->getEndPoint() . 'GetStoreStatus/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }
}
