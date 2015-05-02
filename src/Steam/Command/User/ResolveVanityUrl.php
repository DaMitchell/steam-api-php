<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class ResolveVanityUrl implements CommandInterface
{
    const INDIVIDUAL_PROFILE = 1;
    const GROUP = 2;
    const OFFICIAL_GROUP_NAME = 3;

    /**
     * @var string
     */
    protected $vanityUrl;

    /**
     * @var int
     */
    protected $urlType;

    /**
     * @param string $vanityUrl
     * @param int $urlType
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($vanityUrl, $urlType = self::INDIVIDUAL_PROFILE)
    {
        $this->vanityUrl = $vanityUrl;

        if(!in_array($urlType, [1, 2, 3])) {
            throw new \InvalidArgumentException('The url type can be only be either 1, 2 or 3');
        }

        $this->urlType = $urlType;
    }

    public function getInterface()
    {
        return 'ISteamUser';
    }

    public function getMethod()
    {
        return 'ResolveVanityURL';
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
            'vanityurl' => $this->vanityUrl,
            'url_type' => $this->urlType,
        ];
    }
} 