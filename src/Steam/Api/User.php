<?php

namespace Steam\Api;

use Steam\Api\Exception\InsufficientParameters;
use Steam\Api\Exception\NoSuchUser;
use Steam\Steam;

class User extends Steam
{
    const ENDPOINT_BASE = 'ISteamUser/';

    const USER_RELATION_ALL = 'all';
    const USER_RELATION_FRIEND = 'friend';

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetFriendList
     *
     * @param int $steamId
     * @param string $relationship
     *
     * @return array
     * @throws NoSuchUser
     */
    public function getFriendList($steamId, $relationship = '')
    {
        if (!is_numeric($steamId))
        {
            $resolvedUrl = $this->resolveVanityUrl($steamId);

            if ($resolvedUrl['response']['success'] == 1)
            {
                $steamId = $resolvedUrl['response']['steamid'];
            }
            else
            {
                throw new NoSuchUser(sprintf('User with url "%s" does not exists', $steamId));
            }
        }

        $params = array(
            'steamid' => $steamId
        );

        if ($relationship != '')
        {
            $params['relationship'] = $relationship;
        }

        $url = self::ENDPOINT_BASE . 'GetFriendList/v0001/';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetPlayerBans
     *
     * @param array $steamIds
     * @param bool $dump
     *
     * @return array
     * @throws InsufficientParameters
     * @throws NoSuchUser
     */
    public function getPlayerBans($steamIds = array(), $dump = false)
    {
        $notExistsUsers = array();

        if(count($steamIds) > 0)
        {
            foreach ($steamIds as $key => $id)
            {
                if (!is_numeric($id))
                {
                    $resolvedUrl = $this->resolveVanityUrl($id);

                    if ($resolvedUrl['response']['success'] == 1)
                    {
                        $steamIds[$key] = $resolvedUrl['response']['steamid'];
                    }
                    else
                    {
                        $notExistsUsers[] = $id;
                    }
                }
            }
        }
        else
        {
            throw new InsufficientParameters('You need to pass at least one steam id');
        }

        if(count($notExistsUsers) > 0)
        {
            throw new NoSuchUser(sprintf('User(-s) with url(-s) "%s" not found', join(', ', $notExistsUsers)));
        }

        $params = array(
            'steamids' => join(',', $steamIds)
        );

        $url = self::ENDPOINT_BASE . 'GetPlayerBans/v1/';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetPlayerBans
     *
     * @param array $steamIds
     *
     * @return array
     * @throws NoSuchUser
     * @throws InsufficientParameters
     */
    public function getPlayerSummaries($steamIds)
    {
        $notExistsUsers = array();

        if (count($steamIds) > 0)
        {
            foreach ($steamIds as $key => $id)
            {
                if (!is_numeric($id))
                {
                    $resolvedUrl = $this->resolveVanityUrl($id);

                    if ($resolvedUrl['response']['success'] == 1)
                    {
                        $steamIds[$key] = $resolvedUrl['response']['steamid'];
                    }
                    else
                    {
                        $notExistsUsers[] = $id;
                    }
                }
            }
        }
        else
        {
            throw new InsufficientParameters('You need to pass at least one steam id');
        }

        if (count($notExistsUsers) > 0)
        {
            throw new NoSuchUser(sprintf('User(-s) with url(-s) "%s" not found', join(', ', $notExistsUsers)));
        }

        $params = array(
            'steamids' => join(',', $steamIds)
        );

        $url = self::ENDPOINT_BASE . 'GetPlayerSummaries/v0002/';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/GetUserGroupList
     *
     * @param int $steamId
     *
     * @return array
     * @throws NoSuchUser
     */
    public function getUserGroupList($steamId)
    {
        if (!is_numeric($steamId))
        {
            $resolvedUrl = $this->resolveVanityUrl($steamId);

            if ($resolvedUrl['response']['success'] == 1)
            {
                $steamId = $resolvedUrl['response']['steamid'];
            }
            else
            {
                throw new NoSuchUser(sprintf('User with url "%s" does not exists', $steamId));
            }
        }

        $params = array(
            'steamid' => $steamId
        );

        $url = self::ENDPOINT_BASE . 'GetUserGroupList/v1/';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }

    /**
     * @link http://wiki.teamfortress.com/wiki/WebAPI/ResolveVanityURL
     *
     * @param int $vanityUrl
     *
     * @return array
     */
    public function resolveVanityUrl($vanityUrl)
    {
        $params = array(
            'vanityurl' => $vanityUrl,
        );

        $url = self::ENDPOINT_BASE . 'ResolveVanityURL/v0001/';

        return $this->getAdapter()->request($url, $params)->getParsedBody();
    }
}
