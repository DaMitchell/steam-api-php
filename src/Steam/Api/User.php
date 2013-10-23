<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
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
     * @param int    $steamid
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

        return $this->getAdapter()->request($url, $requestParams)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetPlayerBans
     *
     * @param array $steamids
     *
     * @throws Exception\UserNotExists
     * @throws Exception\InsufficientParameters
     *
     * @return array
     */
    public function getPlayerBans($steamids = array(), $dump = false)
    {
        $notExistsUsers = array();
        $url = self::ENDPOINT_BASE . 'GetPlayerBans/v1/';

        if (count($steamids) > 0) {
            foreach ($steamids as $key=>$id) {
                if (!is_numeric($id)) {
                    $resolvedUrl = $this->resolveVanityUrl($id);
                    if ($resolvedUrl['response']['success'] == 1) {
                        $steamids[$key] = $resolvedUrl['response']['steamid'];
                    } else {
                        $notExistsUsers[] = $id;
                    }
                }
            }
        } else {
            throw new InsufficientParameters('You need to pass at least one steam id');
        }

        if (count($notExistsUsers) > 0) {
            throw new UserNotExists(sprintf('User(-s) with url(-s) "%s" not found', join(', ', $notExistsUsers)));
        }

        $requestParams = array(
            'steamids' => join(',', $steamids)
        );

        return $this->getAdapter()->request($url, $requestParams)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetPlayerBans
     *
     * @param array $steamids
     *
     * @throws Exception\UserNotExists
     * @throws Exception\InsufficientParameters
     *
     * @return array
     */
    public function getPlayerSummaries($steamids)
    {
        $notExistsUsers = array();
        $url = self::ENDPOINT_BASE . 'GetPlayerSummaries/v0002/';

        if (count($steamids) > 0) {
            foreach ($steamids as $key=>$id) {
                if (!is_numeric($id)) {
                    $resolvedUrl = $this->resolveVanityUrl($id);
                    if ($resolvedUrl['response']['success'] == 1) {
                        $steamids[$key] = $resolvedUrl['response']['steamid'];
                    } else {
                        $notExistsUsers[] = $id;
                    }
                }
            }
        } else {
            throw new InsufficientParameters('You need to pass at least one steam id');
        }

        if (count($notExistsUsers) > 0) {
            throw new UserNotExists(sprintf('User(-s) with url(-s) "%s" not found', join(', ', $notExistsUsers)));
        }

        $requestParams = array(
            'steamids' => join(',', $steamids)
        );

        return $this->getAdapter()->request($url, $requestParams)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetUserGroupList
     *
     * @param int $steamid
     *
     * @throws Exception\UserNotExists
     * @return array
     */
    public function getUserGroupList($steamid)
    {
        $url = self::ENDPOINT_BASE . 'GetUserGroupList/v1/';

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

        return $this->getAdapter()->request($url, $requestParams)->getParsedBody();
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
            ))
            ->getParsedBody();
    }

}
