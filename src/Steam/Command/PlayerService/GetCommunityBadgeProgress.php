<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class GetCommunityBadgeProgress implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var int
     */
    protected $badgeId;

    /**
     * @param int $steamId
     * @param int $badgeId
     */
    public function __construct($steamId, $badgeId)
    {
        $this->steamId = $steamId;
        $this->badgeId = $badgeId;
    }

    public function getInterface()
    {
        return 'IPlayerService';
    }

    public function getMethod()
    {
        return 'GetCommunityBadgeProgress';
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
        return [
            'steamid' => $this->steamId,
            'badgeid' => $this->badgeId,
        ];
    }
} 