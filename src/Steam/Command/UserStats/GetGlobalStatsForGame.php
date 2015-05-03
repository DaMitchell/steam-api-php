<?php

namespace Steam\Command\UserStats;

use Steam\Command\CommandInterface;

class GetGlobalStatsForGame implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var array
     */
    protected $statNames;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @param int $appId
     * @param array $statNames
     */
    public function __construct($appId, array $statNames)
    {
        $this->appId = $appId;
        $this->statNames = $statNames;
        $this->count = count($statNames);
    }

    /**
     * @param \DateTime $startDate
     *
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param \DateTime $endDate
     *
     * @return self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getInterface()
    {
        return 'ISteamUserStats';
    }

    public function getMethod()
    {
        return 'GetGlobalStatsForGame';
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
            'count' => $this->count,
            'name' => $this->statNames,
        ];

        empty($this->startDate) ?: $params['startdate'] = $this->startDate->getTimestamp();
        empty($this->endDate) ?: $params['enddate'] = $this->endDate->getTimestamp();

        return $params;
    }
}