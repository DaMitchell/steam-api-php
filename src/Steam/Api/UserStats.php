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
     * @param int $gameId
     *
     * @throws InsufficientParameters
     * @return array
     */
    public function getGlobalAchievementPercentagesForApp($gameId = null)
    {
        if(is_null($gameId))
        {
            $appId = $this->getAdapter()->getConfig()->getAppId();

            if(empty($appId))
            {
                throw new InsufficientParameters('You need to set a appId in the config to use this method');
            }

            $gameId = $appId;
        }

        $params = array(
            'gameid' => $gameId
        );

        $url = self::ENDPOINT_BASE . 'GetGlobalAchievementPercentagesForApp/v0002';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    public function getGlobalStatsForGame()
    {

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