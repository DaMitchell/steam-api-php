<?php
namespace Steam\Api;

use Steam\Api\Economy;
use Steam\SteamTestCase;

class EconomyTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetAssetClassInfoWillThrowExceptionIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $economy = new Economy();
        $economy->setAdapter($this->_adapterMock);
        $economy->getAssetClassInfo();
    }

    public function testGetAssetClassInfoWillBeCalledWithCorrectValues()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'ISteamEconomy/GetAssetClassInfo/v0001';

        $classIds = array(
            123,
            234,
            345,
        );

        $params = array(
            'appid' => 570,
            'class_count' => 3,
            'classid0' => 123,
            'classid1' => 234,
            'classid2' => 345,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $economy = new Economy();
        $economy->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $economy->getAssetClassInfo($classIds));
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetAssetPricesWillThrowExceptionIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $economy = new Economy();
        $economy->setAdapter($this->_adapterMock);
        $economy->getAssetPrices();
    }

    public function testGetAssetPricesWillBeCalledWithCorrectDataNoCurrencySet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'ISteamEconomy/GetAssetPrices/v0001';
        $params = array(
            'appid' => 570,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $economy = new Economy();
        $economy->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $economy->getAssetPrices());
    }

    public function testGetAssetPricesWillBeCalledWithCorrectDataWithCurrencySet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $url = 'ISteamEconomy/GetAssetPrices/v0001';
        $params = array(
            'appid' => 570,
            'currency' => 'EUR'
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $economy = new Economy();
        $economy->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $economy->getAssetPrices('EUR'));
    }
}
