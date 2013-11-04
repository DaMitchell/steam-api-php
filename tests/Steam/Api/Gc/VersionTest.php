<?php

namespace Steam\Api\Gc;
 
use Steam\SteamTestCase;

class VersionTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetClientVersionThrowsAnExceptionIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $version = new Version();
        $version->setAdapter($this->_adapterMock);
        $version->getClientVersion();
    }

    public function testGetClientVersionIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IGCVersion_570/GetClientVersion/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $version = new Version();
        $version->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $version->getClientVersion());
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetClusterVersionThrowsAnExceptionIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $version = new Version();
        $version->setAdapter($this->_adapterMock);
        $version->getClusterVersion();
    }

    public function testGetClusterVersionIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IGCVersion_570/GetClusterVersion/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $version = new Version();
        $version->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $version->getClusterVersion());
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetServerVersionThrowsAnExceptionIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $version = new Version();
        $version->setAdapter($this->_adapterMock);
        $version->getClusterVersion();
    }

    public function testGetServerVersionIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'IGCVersion_570/GetServerVersion/v1';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $version = new Version();
        $version->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $version->getServerVersion());
    }
    
}
