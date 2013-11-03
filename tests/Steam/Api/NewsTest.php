<?php
namespace Steam\Api;

use Steam\Api\News;
use Steam\SteamTestCase;

class NewsTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetNewsForAppWillThrowExceptionIfNotAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $news = new News();
        $news->setAdapter($this->_adapterMock);
        $news->getNewsForApp();
    }

    public function testGetNewsForAppWillBeCalledWithAllParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $result = array('result' => array());

        $count = 10;
        $maxLength = 200;
        $endDate = 123234435;

        $url = 'ISteamNews/GetNewsForApp/v0002';

        $this->_adapterMock->expects($this->once())->method('request')->with($url, array(
            'appid' => 570,
            'count' => $count,
            'maxlength' => $maxLength,
            'enddate' => $endDate
        ));

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $news = new News();
        $news->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $news->getNewsForApp($count, $maxLength, $endDate));
    }

    public function testGetNewsForAppWillBeCalledWithSomeParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $result = array('result' => array());

        $count = 10;
        $endDate = 123234435;

        $url = 'ISteamNews/GetNewsForApp/v0002';

        $this->_adapterMock->expects($this->once())->method('request')->with($url, array(
            'appid' => 570,
            'count' => $count,
            'enddate' => $endDate
        ));

        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $news = new News();
        $news->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $news->getNewsForApp($count, null, $endDate));
    }
}
