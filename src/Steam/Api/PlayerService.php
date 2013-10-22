<?php

namespace Steam\Api;

use Steam\Steam;

class PlayerService extends Steam
{
    const ENDPOINT_BASE = 'IPlayerService/';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetRecentlyPlayedGames
     *
     * @param int $steamId
     * @param int $count
     *
     * @return array
     */
    public function getRecentlyPlayedGames($steamId, $count = 10)
    {
        $params = array(
            'steamid' => $steamId,
            'count' => $count,
        );

        $url = self::ENDPOINT_BASE . 'GetRecentlyPlayedGames/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetOwnedGames
     *
     * @param int $steamId
     * @param bool $includeAppInfo
     * @param bool $includePlayedFreeGames
     *
     * @return array
     */
    public function getOwnedGames($steamId, $includeAppInfo = false, $includePlayedFreeGames = false)
    {
        $params = array(
            'steamid' => $steamId,
            'include_appinfo' => $includeAppInfo,
            'include_played_free_games' => $includePlayedFreeGames,
        );

        $url = self::ENDPOINT_BASE . 'GetOwnedGames/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetSteamLevel
     *
     * @param int $steamId
     *
     * @return array
     */
    public function getSteamLevel($steamId)
    {
        $params = array(
            'steamid' => $steamId,
        );

        $url = self::ENDPOINT_BASE . 'GetSteamLevel/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetBadges
     *
     * @param int $steamId
     *
     * @return array
     */
    public function getBadges($steamId)
    {
        $params = array(
            'steamid' => $steamId,
        );

        $url = self::ENDPOINT_BASE . 'GetBadges/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetCommunityBadgeProgress
     *
     * @param int $steamId
     * @param int $badgeId
     *
     * @return mixed
     */
    public function getCommunityBadgeProgress($steamId, $badgeId)
    {
        $params = array(
            'steamid' => $steamId,
            'badgeid' => $badgeId,
        );

        $url = self::ENDPOINT_BASE . 'GetCommunityBadgeProgress/v1';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}