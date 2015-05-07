<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class GetRecentlyPlayedGames implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var int
     */
    protected $count;

    /**
     * @param int $steamId
     * @param int $count
     */
    public function __construct($steamId, $count = 0)
    {
        $this->steamId = $steamId;
        $this->count = $count;
    }

    /**
     * @param int $count
     *
     * @return self
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function getInterface()
    {
        return 'IPlayerService';
    }

    public function getMethod()
    {
        return 'GetRecentlyPlayedGames';
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
            'count' => empty($this->count) ? 0 : (int) $this->count,
        ];
    }
} 