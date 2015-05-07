<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class GetOwnedGames implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var bool
     */
    protected $includeAppInfo;

    /**
     * @var bool
     */
    protected $includeFreeGames;

    /**
     * @var array
     */
    protected $appIdsFilter;

    /**
     * @param int $steamId
     */
    public function __construct($steamId)
    {
        $this->steamId = $steamId;
    }

    /**
     * @param array $appIdsFilter
     *
     * @return self
     */
    public function setAppIdsFilter(array $appIdsFilter)
    {
        $this->appIdsFilter = $appIdsFilter;
        return $this;
    }

    /**
     * @param boolean $includeAppInfo
     *
     * @return self
     */
    public function setIncludeAppInfo($includeAppInfo)
    {
        $this->includeAppInfo = (bool) $includeAppInfo;
        return $this;
    }

    /**
     * @param boolean $includeFreeGames
     *
     * @return self
     */
    public function setIncludeFreeGames($includeFreeGames)
    {
        $this->includeFreeGames = (bool) $includeFreeGames;
        return $this;
    }

    public function getInterface()
    {
        return 'IPlayerService';
    }

    public function getMethod()
    {
        return 'GetOwnedGames';
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
        $params =  [
            'steamid' => $this->steamId,
        ];

        is_null($this->includeAppInfo) ?: $params['include_appinfo'] = $this->includeAppInfo;
        is_null($this->includeFreeGames) ?: $params['include_played_free_games'] = $this->includeFreeGames;
        empty($this->appIdsFilter) ?: $params['appids_filter'] = $this->appIdsFilter;

        return $params;
    }
} 