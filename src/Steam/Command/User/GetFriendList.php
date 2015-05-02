<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class GetFriendList implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var string
     */
    protected $relationship;

    /**
     * @param int $steamId
     */
    public function __construct($steamId)
    {
        $this->steamId = $steamId;
    }

    /**
     * @param string $relationship
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    }

    public function getInterface()
    {
        return 'ISteamUser';
    }

    public function getMethod()
    {
        return 'GetFriendList';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        $params = ['steamid' => $this->steamId];

        empty($this->relationship) ?: $params['relationship'] = $this->relationship;

        return $params;
    }
} 