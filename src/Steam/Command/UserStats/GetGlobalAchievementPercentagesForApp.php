<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetGlobalAchievementPercentagesForApp implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @param int $appId
     */
    public function __construct($appId)
    {
        $this->appId = $appId;
    }

    public function getInterface()
    {
        return 'ISteamUserStats';
    }

    public function getMethod()
    {
        return 'GetGlobalAchievementPercentagesForApp';
    }

    public function getVersion()
    {
        return 'v2';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        return [
            'gameid' => $this->appId,
        ];
    }
}