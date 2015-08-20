<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetMatchHistory implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * The ID of the hero that must be in the matches being queried.
     *
     * @var int
     */
    protected $heroId;

    /**
     * Which game mode to return matches for.
     *
     * @var int
     */
    protected $gameMode;

    /**
     * The average skill range of the match, these can be [1-3] with lower numbers being lower skill.
     *
     * Ignored if an account ID is specified.
     *
     * @var int
     */
    protected $skill;

    /**
     * Minimum number of human players that must be in a match for it to be returned.
     *
     * @var string
     */
    protected $minPlayers;

    /**
     * An account ID to get matches from. This will fail if the user has their match history hidden.
     *
     * @var string
     */
    protected $accountId;

    /**
     * The league ID to return games from.
     *
     * @var string
     */
    protected $leagueId;

    /**
     * The minimum match ID to start from
     *
     * @var int
     */
    protected $startAtMatchId;

    /**
     * The number of requested matches to return.
     *
     * @var string
     */
    protected $matchesRequested;

    /**
     * Whether or not tournament games should only be returned.
     *
     * @var bool
     */
    protected $tournamentMatchesOnly;

    /**
     * @param string $accountId
     *
     * @return self
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @param int $gameMode
     *
     * @return self
     */
    public function setGameMode($gameMode)
    {
        $gameMode = (int) $gameMode;

        if($gameMode < 0 || $gameMode > 16) {
            throw new \InvalidArgumentException('Invalid game mode. Must be between 0 and 16');
        }

        $this->gameMode = $gameMode;
        return $this;
    }

    /**
     * @param int $heroId
     *
     * @return self
     */
    public function setHeroId($heroId)
    {
        $this->heroId = $heroId;
        return $this;
    }

    /**
     * @param int|string $leagueId
     *
     * @return self
     */
    public function setLeagueId($leagueId)
    {
        $this->leagueId = $leagueId;
        return $this;
    }

    /**
     * @param int|string $matchesRequested
     *
     * @return self
     */
    public function setMatchesRequested($matchesRequested)
    {
        $this->matchesRequested = $matchesRequested;
        return $this;
    }

    /**
     * @param int|string $minPlayers
     *
     * @return self
     */
    public function setMinPlayers($minPlayers)
    {
        $this->minPlayers = $minPlayers;
        return $this;
    }

    /**
     * @param int $skill
     *
     * @return self
     */
    public function setSkill($skill)
    {
        $skill = (int) $skill;

        if($skill < 0 || $skill > 3) {
            throw new \InvalidArgumentException('Invalid skill. Must be between 0 and 3');
        }

        $this->skill = $skill;
        return $this;
    }

    /**
     * @param int $startAtMatchId
     *
     * @return self
     */
    public function setStartAtMatchId($startAtMatchId)
    {
        $this->startAtMatchId = $startAtMatchId;
        return $this;
    }

    /**
     * @param bool $tournamentMatchesOnly
     *
     * @return self
     */
    public function setTournamentMatchesOnly($tournamentMatchesOnly)
    {
        $this->tournamentMatchesOnly = (bool) $tournamentMatchesOnly;
        return $this;
    }

    public function getInterface()
    {
        return 'IDOTA2Match_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetMatchHistory';
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

        empty($this->heroId) ?: $params['hero_id'] = $this->heroId;
        empty($this->gameMode) ?: $params['game_mode'] = $this->gameMode;
        empty($this->skill) ?: $params['skill'] = $this->skill;
        empty($this->minPlayers) ?: $params['min_players'] = $this->minPlayers;
        empty($this->accountId) ?: $params['account_id'] = $this->accountId;
        empty($this->leagueId) ?: $params['league_id'] = $this->leagueId;
        empty($this->startAtMatchId) ?: $params['start_at_match_id'] = $this->startAtMatchId;
        empty($this->matchesRequested) ?: $params['matches_requested'] = $this->matchesRequested;
        is_null($this->tournamentMatchesOnly) ?: $params['tournament_games_only'] = $this->tournamentMatchesOnly;

        return $params;
    }
} 