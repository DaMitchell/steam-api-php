<?php

namespace Steam\Adapter;
 
use Composer\Config;
use JMS\Serializer\SerializerBuilder;
use Steam\Configuration;

class GuzzleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Configuration
     */
    protected $_config;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_clientMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_requestMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_responseMock;

    public function setUp()
    {
        $this->_config = new Configuration(array(
            'appId' => 570,
        ));

        $this->_responseMock = $this->getMock('\Guzzle\Http\Message\Response', array('getBody'), array(), '', false);

        $this->_requestMock = $this->getMock('\Guzzle\Http\Message\Request', array('send'), array(), '', false);
        $this->_requestMock->expects($this->any())->method('send')->will($this->returnValue($this->_responseMock));

        $this->_clientMock = $this->getMock('\Guzzle\Http\Client', array('get'), array(), '', false);
        $this->_clientMock->expects($this->any())->method('get')->will($this->returnValue($this->_requestMock));
    }

    public function testPassingInTheConfigObjectCanBeRetrieved()
    {
        $config = new Configuration(array(
            'appId' => 570,
        ));

        $guzzle = new Guzzle($config);

        $this->assertEquals($config, $guzzle->getConfig());
    }

    public function testSettingSerializer()
    {
        $serializer = SerializerBuilder::create()->build();

        $guzzle = new Guzzle($this->_config);
        $guzzle->setSerializer($serializer);

        $this->assertEquals($serializer, $guzzle->getSerializer());
    }

    public function testSettingTheGuzzleClient()
    {
        $guzzle = new Guzzle($this->_config);
        $guzzle->setClient($this->_clientMock);

        $this->assertEquals($this->_clientMock, $guzzle->getClient());
    }

    public function testMakingARequestWithAKeyAndLanguage()
    {
        $key = 'A34S5FHDSDFLJDSKD';
        $language = 'en';

        $this->_config->setSteamKey($key);
        $this->_config->setLanguage($language);

        $url = 'TestApiEndPoint/v1?key=' . $key . '&language=' . $language;

        $this->_clientMock->expects($this->once())->method('get')->with($url);

        $guzzle = new Guzzle($this->_config);
        $guzzle->setClient($this->_clientMock);

        $guzzle->request('TestApiEndPoint/v1');
    }

    public function testGettingTheRawBodyOfARequest()
    {
        $url = 'TestApiEndPoint/v1';

        $body = '{"result":{"key":"value"}}';

        $this->_clientMock->expects($this->once())->method('get')->with($url);
        $this->_responseMock->expects($this->once())->method('getBody')->will($this->returnValue(
            $body
        ));

        $guzzle = new Guzzle($this->_config);
        $guzzle->setClient($this->_clientMock);

        $guzzle->request('TestApiEndPoint/v1');

        $this->assertEquals($body, $guzzle->getRawBody());
    }

    public function testGettingTheParsedBodyOfARequest()
    {
        $url = 'TestApiEndPoint/v1';

        $body = '{"results":{"key":"value"}}';
        $result = array(
            'results' => array(
                'key' => 'value',
            ),
        );

        $this->_clientMock->expects($this->once())->method('get')->with($url);
        $this->_responseMock->expects($this->once())->method('getBody')->will($this->returnValue(
            $body
        ));

        $guzzle = new Guzzle($this->_config);
        $guzzle->setSerializer(SerializerBuilder::create()->build());
        $guzzle->setClient($this->_clientMock);

        $guzzle->request('TestApiEndPoint/v1');

        $this->assertEquals($result, $guzzle->getParsedBody());
    }

    public function testLazyLoadingOfGuzzleClient()
    {
        $guzzle = new Guzzle($this->_config);

        $this->assertInstanceOf('\\Guzzle\Http\Client', $guzzle->getClient());
    }
}
