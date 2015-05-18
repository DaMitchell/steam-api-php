<?php

namespace Steam\Command\Dota2\Fantasy;
 
use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetFantasyPlayerStats implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $fantasyLeagueId;

    /**
     * @var \DateTime
     */
    protected $startTime;

    /**
     * @var \DateTime
     */
    protected $endTime;

    /**
     * @var int
     */
    protected $matchId;

    /**
     * @var int
     */
    protected $seriesId;

    /**
     * @var int
     */
    protected $playerAccountId;

    /**
     * @param int $fantasyLeagueId
     */
    public function __construct($fantasyLeagueId)
    {
        $this->fantasyLeagueId = (int) $fantasyLeagueId;
    }

    /**
     * @param \Datetime $startTime
     *
     * @return self
     */
    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @param \DateTime $endTime
     *
     * @return self
     */
    public function setEndTime(\DateTime $endTime)
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @param int $matchId
     *
     * @return self
     */
    public function setMatchId($matchId)
    {
        $this->matchId = $matchId;
        return $this;
    }

    /**
     * @param int $seriesId
     *
     * @return self
     */
    public function setSeriesId($seriesId)
    {
        $this->seriesId = $seriesId;
        return $this;
    }

    /**
     * @param int $playerAccountId
     *
     * @return self
     */
    public function setPlayerAccountId($playerAccountId)
    {
        $this->playerAccountId = $playerAccountId;
        return $this;
    }

    public function getInterface()
    {
        return 'IDOTA2Fantasy_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetFantasyPlayerStats';
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
            'FantasyLeagueID' => $this->fantasyLeagueId,
        ];

        empty($this->startTime) ?: $params['StartTime'] = $this->startTime->getTimestamp();
        empty($this->endTime) ?: $params['EndTime'] = $this->endTime->getTimestamp();
        empty($this->matchId) ?: $params['matchid'] = $this->matchId;
        empty($this->seriesId) ?: $params['SeriesID'] = $this->seriesId;
        empty($this->playerAccountId) ?: $params['PlayerAccountID'] = $this->playerAccountId;

        return $params;
    }
}
