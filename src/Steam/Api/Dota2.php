<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class Dota2 extends Steam
{
    const ENDPOINT_BASE = 'IEconDOTA2_{id}/';

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
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetRarities
     *
     * @return array
     */
    public function getRarities()
    {
        $url = $this->getEndPoint() . 'GetRarities/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetHeroes
     *
     * @param bool $itemizedOnly
     *
     * @return array
     */
    public function getHeroes($itemizedOnly)
    {
        $params = array(
            'itemizedonly' => (bool) $itemizedOnly
        );

        $url = $this->getEndPoint() . 'GetHeroes/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @return array
     */
    public function getTournamentPrizePool()
    {
        $url = $this->getEndPoint() . 'GetTournamentPrizePool/v1';

        return $this->getAdapter()->request($url)->getParsedBody();
    }
}
