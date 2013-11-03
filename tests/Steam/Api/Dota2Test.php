<?php

namespace Steam\Api;
 
use Steam\Api\Dota2;
use Steam\SteamTestCase;

class Dota2Test extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetRaritiesWillThrowAnExceptionWhenAppIdReturnsNull()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);
        $dota->getRarities();
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetRaritiesWillThrowAnExceptionWhenAppIdReturnsZero()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(0));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);
        $dota->getRarities();
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetRaritiesWillThrowAnExceptionWhenAppIdReturnsFalse()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(false));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);
        $dota->getRarities();
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetRaritiesWillThrowAnExceptionWhenAppIdReturnsEmptyArray()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(array()));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);
        $dota->getRarities();
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetRaritiesWillThrowAnExceptionWhenAppIdReturnsEmptyString()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(''));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);
        $dota->getRarities();
    }

    public function testGetRaritiesWillBeCalledWithCorrectValueAndReturnCorrectResult()
    {
        $result = array(
            'request' => array(),
        );

        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $this->_adapterMock->expects($this->once())->method('request')->with('IEconDOTA2_570/GetRarities/v1');
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $dota->getRarities());
    }

    public function testGetHeroesWillBeCalledWithCorrectValueAndReturnCorrectResultAndTruePassedIn()
    {
        $result = array(
            'request' => array(),
        );

        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $this->_adapterMock->expects($this->once())->method('request')->with('IEconDOTA2_570/GetHeroes/v1', array(
            'itemizedonly' => true
        ));
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $dota->getHeroes(true));
    }

    public function testGetTournamentPrizePoolWillBeCalledWithCorrectValueAndReturnCorrectResult()
    {
        $result = array(
            'request' => array(),
        );

        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $this->_adapterMock->expects($this->once())->method('request')->with('IEconDOTA2_570/GetTournamentPrizePool/v1');
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $dota = new Dota2();
        $dota->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $dota->getTournamentPrizePool());
    }
}
