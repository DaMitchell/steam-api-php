<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetScheduledLeagueGames implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var \DateTime
     */
    protected $dateMin;

    /**
     * @var \DateTime
     */
    protected $dateMax;

    /**
     * @param \DateTime $dateMin
     *
     * @return self
     */
    public function setDateMin(\DateTime $dateMin)
    {
        $this->dateMin = $dateMin;
        return $this;
    }

    /**
     * @param \DateTime $dateMax
     *
     * @return self
     */
    public function setDateMax(\DateTime $dateMax)
    {
        $this->dateMax = $dateMax;
        return $this;
    }

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetScheduledLeagueGames';
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
        $params = [];

        empty($this->dateMin) ?: $params['date_min'] = $this->dateMin->getTimestamp();
        empty($this->dateMax) ?: $params['date_max'] = $this->dateMax->getTimestamp();

        return $params;
    }
} 