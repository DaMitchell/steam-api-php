<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
use Steam\Steam;

class UserStats extends Steam
{
    const ENDPOINT_BASE = 'ISteamUserStats/';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetGlobalAchievementPercentagesForApp
     *
     * @throws InsufficientParameters
     * @return array
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
     * @throws Exception\InsufficientParameters
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
    }

    public function getPlayerAchievements()
    {
    }

    public function getSchemaForGame()
    {
    }

    public function getUserStatsForGame()
    {
    }
}