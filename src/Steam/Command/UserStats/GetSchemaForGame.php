<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetSchemaForGame implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var string
     */
    protected $language;

    /**
     * @param int $appId
     */
    public function __construct($appId)
    {
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
        return 'GetSchemaForGame';
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
        $params = [
            'appid' => $this->appId,
        ];

        empty($this->language) ?: $params['l'] = $this->language;

        return $params;
    }
} 