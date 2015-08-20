<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetMatchHistoryBySequenceNum implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $startAtMatchSeqNum;

    /**
     * @var int
     */
    protected $matchesRequested;

    /**
     * @param int $startAtMatchSeqNum
     *
     * @return self
     */
    public function setStartAtMatchSeqNum($startAtMatchSeqNum)
    {
        $this->startAtMatchSeqNum = $startAtMatchSeqNum;
        return $this;
    }

    /**
     * @param int $matchesRequested
     *
     * @return self
     */
    public function setMatchesRequested($matchesRequested)
    {
        $this->matchesRequested = $matchesRequested;
        return $this;
    }

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetMatchHistoryBySequenceNum';
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

        empty($this->startAtMatchSeqNum) ?: $params['start_at_match_seq_num'] = $this->startAtMatchSeqNum;
        empty($this->matchesRequested) ?: $params['matches_requested'] = $this->matchesRequested;

        return $params;
    }
} 