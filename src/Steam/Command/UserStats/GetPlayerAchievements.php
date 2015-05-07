<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetPlayerAchievements implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var int
     */
    protected $appId;

    /**
     * @var string
     */
    protected $language;

    /**
     * @param int $steamId
     * @param int $appId
     */
    public function __construct($steamId, $appId)
    {
        $this->steamId = $steamId;
        $this->appId = $appId;
    }

    /**
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    public function getInterface()
    {
        return 'ISteamUserStats';
    }

    public function getMethod()
    {
        return 'GetPlayerAchievements';
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
        $params = [
            'steamid' => $this->steamId,
            'appid' => $this->appId,
        ];

        empty($this->language) ?: $params['l'] = $this->language;

        return $params;
    }
} 