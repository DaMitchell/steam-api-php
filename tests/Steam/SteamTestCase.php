<?php

namespace Steam;
 
abstract class SteamTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_configMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_adapterMock;

    public function setUp()
    {
        $methods = array(
            'getAppId',
            'getLanguage',
            'getSteamKey',
        );

        $this->_configMock = $this->getMock('\Steam\Configuration', $methods, array(), '', false);

        $methods = array(
            'request',
            'getParsedBody',
            'getConfig'
        );

        $this->_adapterMock = $this->getMock('\Steam\Adapter\Guzzle', $methods, array(), '', false);
        $this->_adapterMock->expects($this->any())->method('getConfig')->will($this->returnValue($this->_configMock));
        $this->_adapterMock->expects($this->any())->method('request')->will($this->returnSelf());
    }
}
