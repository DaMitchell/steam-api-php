<?php

namespace Steam\Api\Items;
 
use Steam\SteamTestCase;

class EconTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testAnExceptionIsThrownIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $match = new Econ();
        $match->setAdapter($this->_adapterMock);
        $match->getPlayerItems(3423423424);
    }

    public function testGetLeagueListingIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $steamId = 234234234;

        $url = 'IEconItems_570/GetPlayerItems/v0001';
        $params = array(
            'steamid' => $steamId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Econ();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getPlayerItems($steamId));
    }

    public function testGetSchemaIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IEconItems_570/GetSchema/v0001';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Econ();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getSchema());
    }

    public function testGetSchemaURLIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IEconItems_570/GetSchemaURL/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Econ();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getSchemaUrl());
    }

    public function testGetStoreMetaDataIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IEconItems_570/GetStoreMetaData/v0001';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Econ();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getStoreMetadata());
    }

    public function testGetStoreStatusIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IEconItems_570/GetStoreStatus/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Econ();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getStoreStatus());
    }
}
