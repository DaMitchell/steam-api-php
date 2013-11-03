<?php

namespace Steam\Api\Dota2\Match;

class HistoryConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HistoryConfiguration
     */
    protected $_historyConfiguration;

    public function setUp()
    {
        $this->_historyConfiguration = new HistoryConfiguration(array(
            HistoryConfiguration::HERO_ID => 10,
            HistoryConfiguration::LEAGUE_ID => 123,
        ));
    }

    public function testOptionsHaveBeenSetInTheConstructor()
    {
        $options = array(
            HistoryConfiguration::PLAYER_NAME => null,
            HistoryConfiguration::HERO_ID => 10,
            HistoryConfiguration::GAME_MODE => null,
            HistoryConfiguration::SKILL => null,
            HistoryConfiguration::DATE_MIN => null,
            HistoryConfiguration::DATE_MAX => null,
            HistoryConfiguration::MIN_PLAYERS => null,
            HistoryConfiguration::ACCOUNT_ID => null,
            HistoryConfiguration::LEAGUE_ID => 123,
            HistoryConfiguration::START_AT_MATCH_ID => null,
            HistoryConfiguration::MATCHES_REQUESTED => null,
            HistoryConfiguration::TOURNAMENT_MATCHES_ONLY => null,
        );

        $this->assertEquals($options, $this->_historyConfiguration->getOptions());
    }

    public function testOptionsCanBeSetIndividually()
    {
        $options = array(
            HistoryConfiguration::PLAYER_NAME => 'Vestri',
            HistoryConfiguration::HERO_ID => 10,
            HistoryConfiguration::GAME_MODE => null,
            HistoryConfiguration::SKILL => null,
            HistoryConfiguration::DATE_MIN => null,
            HistoryConfiguration::DATE_MAX => null,
            HistoryConfiguration::MIN_PLAYERS => null,
            HistoryConfiguration::ACCOUNT_ID => null,
            HistoryConfiguration::LEAGUE_ID => 123,
            HistoryConfiguration::START_AT_MATCH_ID => null,
            HistoryConfiguration::MATCHES_REQUESTED => null,
            HistoryConfiguration::TOURNAMENT_MATCHES_ONLY => null,
        );

        $this->_historyConfiguration->setOption(HistoryConfiguration::PLAYER_NAME, 'Vestri');

        $this->assertEquals($options, $this->_historyConfiguration->getOptions());
    }

    public function testSettingMultipleOptions()
    {
        $options = array(
            HistoryConfiguration::PLAYER_NAME => null,
            HistoryConfiguration::HERO_ID => 10,
            HistoryConfiguration::GAME_MODE => null,
            HistoryConfiguration::SKILL => null,
            HistoryConfiguration::DATE_MIN => 123123123,
            HistoryConfiguration::DATE_MAX => 435345345,
            HistoryConfiguration::MIN_PLAYERS => null,
            HistoryConfiguration::ACCOUNT_ID => null,
            HistoryConfiguration::LEAGUE_ID => 123,
            HistoryConfiguration::START_AT_MATCH_ID => null,
            HistoryConfiguration::MATCHES_REQUESTED => null,
            HistoryConfiguration::TOURNAMENT_MATCHES_ONLY => null,
        );

        $this->_historyConfiguration->setOptions(array(
            HistoryConfiguration::DATE_MIN => 123123123,
            HistoryConfiguration::DATE_MAX => 435345345,
        ));

        $this->assertEquals($options, $this->_historyConfiguration->getOptions());
    }

    /**
     * @expectedException \Steam\Api\Exception\InvalidParameter
     */
    public function testExceptionIsThrownWhenAnInvalidOptionIsPassedIn()
    {
        $this->_historyConfiguration->setOption('randomOption', 123);
    }

    /**
     * @expectedException \Steam\Api\Exception\InvalidParameter
     */
    public function testExceptionIsThrownWhenAnInvalidOptionsArePassedIn()
    {
        $this->_historyConfiguration->setOptions(array(
            'randomOption' => 123123
        ));
    }
}
