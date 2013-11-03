<?php

namespace Steam\Api;
 
use Steam\SteamTestCase;

class WebApiUtilTest extends SteamTestCase
{
    public function testGetServerInfoIsCalledWithCorrectUrl()
    {
        $url = 'ISteamWebAPIUtil/GetServerInfo/v0001';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $webApiUtils = new WebApiUtil();
        $webApiUtils->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $webApiUtils->getServerInfo());
    }

    public function testGetSupportedAPIListIsCalledWithCorrectUrl()
    {
        $url = 'ISteamWebAPIUtil/GetSupportedAPIList/v0001';

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $webApiUtils = new WebApiUtil();
        $webApiUtils->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $webApiUtils->getSupportedApiList());
    }
}
