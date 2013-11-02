<?php

namespace Steam\Api\Portal2;
 
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Leaderboards extends Steam
{
    const ENDPOINT_BASE = 'IPortal2Leaderboards_{id}/';

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
     * @param string $leaderboardName
     *
     * @return mixed
     */
    public function getBucketizedData($leaderboardName)
    {
        $params = array(
            'leaderboardName' => $leaderboardName,
        );

        $url = $this->getEndPoint() . 'GetBucketizedData/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}
