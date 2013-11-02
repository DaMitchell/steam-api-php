<?php
namespace Steam\Api\Dota2;

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Api\Dota2\Match;
use Steam\Configuration;

class MatchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Match
     */
    protected $_instance = null;

    public function setUp()
    {
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C',
            'appId' => \Steam\Apps::DOTA_2_ID,
        );

        $config = new Configuration($options);

        $adapter = new Guzzle($config);
        $adapter->setSerializer(SerializerBuilder::create()->build());

        $this->_instance = new Match();
        $this->_instance->setAdapter($adapter);
    }

    public function testGetMatchDetails()
    {
        $expected = array();

        $actual = $this->_instance->getMatchDetails(365171342);

        var_dump($actual);

        //$this->assertEquals($expected, $actual, 'The method should return data about the match');
    }
}
