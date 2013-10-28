<?php

namespace Steam\Api\Econ;
 
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Items extends Steam
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
     * @param string $language
     *
     * @return array
     */
    public function getSchema($language)
    {
        $params = array(
            'language' => $language
        );

        $url = $this->getEndPoint() . 'GetSchema/v0001';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
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
     * @param string $language
     *
     * @return array
     */
    public function getStoreMetadata($language)
    {
        $params = array(
            'language' => $language
        );

        $url = $this->getEndPoint() . 'GetSchema/v0001';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    public function getStoreStatus()
    {
        $url = $this->getEndPoint() . 'GetStoreStatus/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }
}
