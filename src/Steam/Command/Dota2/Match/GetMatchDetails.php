<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetMatchDetails implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $matchId;

    /**
     * @param int $matchId
     */
    public function __construct($matchId)
    {
        $this->matchId = (int) $matchId;
    }

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetMatchDetails';
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
            'match_id' => $this->matchId,
        ];
    }
} 