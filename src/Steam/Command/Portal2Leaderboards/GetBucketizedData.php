<?php

namespace Steam\Command\Portal2Leaderboards;
 
use Steam\Command\CommandInterface;
use Steam\Traits\Portal2CommandTrait;

class GetBucketizedData implements CommandInterface
{
    use Portal2CommandTrait;

    /**
     * @var string
     */
    protected $leaderboardName;

    /**
     * @param string $leaderboardName
     */
    public function __construct($leaderboardName)
    {
        $this->leaderboardName = $leaderboardName;
    }

    public function getInterface()
    {
        return 'IPortal2Leaderboards_' . $this->getPortal2AppId();
    }

    public function getMethod()
    {
        return 'GetBucketizedData';
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
            'leaderboardName' => $this->leaderboardName,
        ];
    }
}
