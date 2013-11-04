<?php
namespace Steam\Api;

use Steam\Api\Apps;
use Steam\SteamTestCase;

class AppsTest extends SteamTestCase
{
    public function testGetAppList()
    {
        $result = array(
            'request' => array(),
        );

        $this->_adapterMock->expects($this->once())->method('request')->with('ISteamApps/GetAppList/v2');
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $apps->getAppList());
    }

    /**
     * @expectedException \Steam\Api\Exception\NoAdapterSetException
     */
    public function testExceptionIsThrownIfNoAdapterIsSet()
    {
        $apps = new Apps();
        $apps->upToDateCheck(12);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testUpToDateCheckWillThrowAnExceptionWhenAppIdReturnsNull()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);
        $apps->upToDateCheck(12);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testUpToDateCheckWillThrowAnExceptionWhenAppIdReturnsZero()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(0));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);
        $apps->upToDateCheck(12);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testUpToDateCheckWillThrowAnExceptionWhenAppIdReturnsFalse()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(false));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);
        $apps->upToDateCheck(12);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testUpToDateCheckWillThrowAnExceptionWhenAppIdReturnsEmptyArray()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(array()));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);
        $apps->upToDateCheck(12);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testUpToDateCheckWillThrowAnExceptionWhenAppIdReturnsEmptyString()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(''));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);
        $apps->upToDateCheck(12);
    }

    public function testUpToDateCheckWillReturnResponseWhenCalledCorrectly()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $this->_adapterMock->expects($this->once())->method('request')->with('ISteamApps/UpToDateCheck/v1', array(
            'appid' => 570,
            'version' => 12
        ));

        $result = array(
            'request' => array(),
        );

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $apps = new Apps();
        $apps->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $apps->upToDateCheck(12));
    }
}