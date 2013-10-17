<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;
use Steam\Api\Exception\UserNotExists;
use Steam\Steam;

class User extends Steam
{
    const ENDPOINT_BASE = 'ISteamUser/';

    const USER_RELATION_ALL = 'all';
    const USER_RELATION_FRIEND = 'friend';

    /**
     * @link https://developer.valvesoftware.com/wiki/Steam_Web_API#GetFriendList_.28v0001.29
     *
     * @param int $steamid
     * @param string $relationship
     *
     * @throws Exception\UserNotExists
     * @return array
     */
    public function getFriendList($steamid, $relationship = '')
    {
        $url = self::ENDPOINT_BASE . 'GetFriendList/v0001/';

        if (!is_numeric($steamid)) {
            $resolvedUrl = $this->resolveVanityUrl($steamid);
            if ($resolvedUrl['response']['success'] == 1) {
                $steamid = $resolvedUrl['response']['steamid'];
            } else {
                throw new UserNotExists(sprintf('User with url "%s" does not exists', $steamid));
            }
        }

        $requestParams = array(
            'steamid' => $steamid
        );

        if ($relationship != '') {
            $requestParams['relationship'] = $relationship;
        }

        return $this->getAdapter()->request($url, $requestParams, $this->getConfig()->getSteamKey())->getParsedBody();
    }

    public function getPlayerBans()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getPlayerSummaries()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getUserGroupList()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/ResolveVanityURL
     *
     * @param int $vanityurl
     *
     * @return array
     */
    public function resolveVanityUrl($vanityurl)
    {
        $url = self::ENDPOINT_BASE . 'ResolveVanityURL/v0001/';

        return $this->getAdapter()
            ->request($url, array(
                'vanityurl' => $vanityurl,
            ), $this->getConfig()->getSteamKey())
            ->getParsedBody();
    }
}