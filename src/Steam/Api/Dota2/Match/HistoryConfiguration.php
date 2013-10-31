<?php

namespace Steam\Api\Dota2\Match;
 
use Steam\Api\Exception\InvalidParameter;

class HistoryConfiguration
{
    const PLAYER_NAME = 'player_name';

    const HERO_ID = 'hero_id';

    const GAME_MODE = 'game_mode';

    const SKILL = 'skill';

    const DATE_MIN = 'data_min';

    const DATE_MAX = 'data_max';

    const MIN_PLAYERS = 'min_players';

    const ACCOUNT_ID = 'account_id';

    const LEAGUE_ID = 'league_id';

    const START_AT_MATCH_ID = 'start_at_match_id';

    const MATCHES_REQUESTED = 'matches_requested';

    const TOURNAMENT_MATCHES_ONLY = 'tournament_matches_only';

    /**
     * @var array
     */
    protected $_options = array(
        self::PLAYER_NAME => null,
        self::HERO_ID => null,
        self::GAME_MODE => null,
        self::SKILL => null,
        self::DATE_MIN => null,
        self::DATE_MAX => null,
        self::MIN_PLAYERS => null,
        self::ACCOUNT_ID => null,
        self::LEAGUE_ID => null,
        self::START_AT_MATCH_ID => null,
        self::MATCHES_REQUESTED => null,
        self::TOURNAMENT_MATCHES_ONLY => null,
    );

    /**
     * @param array $options
     */
    public function __construct($options = array())
    {
        if(!empty($options))
        {
            $this->setOptions($options);
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return HistoryConfiguration
     * @throws InvalidParameter
     */
    public function setOption($key, $value)
    {
        if(!array_key_exists($key, $this->_options))
        {
            throw new InvalidParameter('The parameter "' . $key . '" is not available in the match history API call');
        }

        $this->_options[$key] = $value;

        return $this;
    }

    /**
     * @param array $options
     *
     * @return HistoryConfiguration
     */
    public function setOptions(array $options)
    {
        foreach($options as $key => $value)
        {
            $this->setOption($key, $value);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }
}
