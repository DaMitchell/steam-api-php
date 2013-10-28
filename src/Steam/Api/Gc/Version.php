<?php

namespace Steam\Api\Gc;
 
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Version extends Steam
{
    const ENDPOINT_BASE = 'IGCVersion_{id}/';

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
     * @return array
     */
    public function getClientVersion()
    {
        $url = $this->getEndPoint() . 'GetClientVersion/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @return array
     */
    public function getClusterVersion()
    {
        $url = $this->getEndPoint() . 'GetClusterVersion/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @return array
     */
    public function getServerVersion()
    {
        $url = $this->getEndPoint() . 'GetServerVersion/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }
}
