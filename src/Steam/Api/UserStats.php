<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;
use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class UserStats extends Steam
{
    const ENDPOINT_BASE = 'ISteamUserStats/';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetGlobalAchievementPercentagesForApp
     *
     * @return array
     * @throws InsufficientParameters
     */
    public function getGlobalAchievementPercentagesForApp()
    {
        $appId = $this->getAdapter()->getConfig()->getAppId();

        if(empty($appId))
        {
            throw new InsufficientParameters('You need to set a appId in the config to use this method');
        }

        $gameId = $appId;

        $params = array(
            'gameid' => $gameId
        );

        $url = self::ENDPOINT_BASE . 'GetGlobalAchievementPercentagesForApp/v0002';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetGlobalStatsForGame
     *
     * @param int $count
     * @param array $names
     * @param int $startDate
     * @param int $endDate
     *
     * @return array
     * @throws InsufficientParameters
     */
    public function getGlobalStatsForGame($count, array $names, $startDate = null, $endDate = null)
    {
        $appId = $this->getAdapter()->getConfig()->getAppId();

        if(empty($appId))
        {
            throw new InsufficientParameters('You need to set a appId in the config to use this method');
        }

        $params = array(
            'appid' => $appId,
            'count' => $count,
            'name' => $names,
        );

        if(!is_null($startDate))
        {
            $params['startdate'] = $startDate;
        }

        if(!is_null($endDate))
        {
            $params['enddate'] = $endDate;
        }


        $url = self::ENDPOINT_BASE . 'GetGlobalStatsForGame/v0001';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    public function getNumberOfCurrentPlayers()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented'));
    }

    public function getPlayerAchievements()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented'));
    }

    public function getSchemaForGame()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented'));
    }

    public function getUserStatsForGame()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented'));
    }
}