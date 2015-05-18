<?php

namespace Steam\Command\Directory;
 
use Steam\Command\CommandInterface;

class GetCMList implements CommandInterface
{
    /**
     * @var int
     */
    protected $cellId;

    /**
     * @var int
     */
    protected $maxCount;

    /**
     * @param int $appId
     */
    public function __construct($appId)
    {
        $this->cellId = $appId;
    }

    /**
     * @param int $maxCount
     */
    public function setMaxCount($maxCount)
    {
        $this->maxCount = $maxCount;
    }

    public function getInterface()
    {
        return 'ISteamDirectory';
    }

    public function getMethod()
    {
        return 'GetCMList';
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
            'cellid' => $this->cellId,
        ];

        empty($this->maxCount) ?: $params['maxcount'] = $this->maxCount;

        return $params;
    }
}
