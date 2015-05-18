<?php

namespace Steam\Command\RemoteStorage;
 
use Steam\Command\CommandInterface;

class GetUGCFileDetails implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var int
     */
    protected $ugcId;

    /**
     * @param int $appId
     * @param int $ugcId
     */
    public function __construct($appId, $ugcId)
    {
        $this->appId = $appId;
        $this->ugcId = $ugcId;
    }

    /**
     * @param int $steamId
     */
    public function setSteamId($steamId)
    {
        $this->steamId = $steamId;
    }

    public function getInterface()
    {
        return 'ISteamRemoteStorage';
    }

    public function getMethod()
    {
        return 'GetUGCFileDetails';
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
            'appid' => $this->appId,
            'ugcid' => $this->ugcId,
        ];

        empty($this->steamId) ?: $params['steamid'] = $this->steamId;

        return $params;
    }
}
