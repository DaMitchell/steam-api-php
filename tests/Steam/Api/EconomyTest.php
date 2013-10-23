<?php
namespace Steam;

use Steam\Api\Economy;

class EconomyTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAssetClassInfo()
    {
        $result = array(
            'result' => array(
                'success' => true,
                'classnumber' => 'classnumber',
            )
        );

        $config = $this->getMockBuilder('\Steam\Configuration')
            ->disableOriginalConstructor()
            ->getMock();
        $config->expects($this->once())->method('getAppId')->will($this->returnValue(1));

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());
        $mock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));
        $mock->expects($this->once())->method('getConfig')->will($this->returnValue($config));

        $economy = new Economy();
        $economy->setAdapter($mock);
        $classInfo = $economy->getAssetClassInfo(array(1,2,3));
        $this->assertEquals($result, $classInfo);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetAssetClassInfoException()
    {
        $config = $this->getMockBuilder('\Steam\Configuration')
            ->disableOriginalConstructor()
            ->getMock();
        $config->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('getConfig')->will($this->returnValue($config));

        $economy = new Economy();
        $economy->setAdapter($mock);
        $economy->getAssetClassInfo(array(1,2,3));
    }

    public function testGetAssetPrices()
    {
        $result = array(
            'result' => array(
                'success' => true,
                'assets' => array(
                    'classid' => 42,
                    'tags' => array(
                        'tag1',
                        'tag2',
                    ),
                ),
            ),
        );

        $config = $this->getMockBuilder('\Steam\Configuration')
            ->disableOriginalConstructor()
            ->getMock();
        $config->expects($this->once())->method('getAppId')->will($this->returnValue(1));

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());
        $mock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));
        $mock->expects($this->once())->method('getConfig')->will($this->returnValue($config));

        $economy = new Economy();
        $economy->setAdapter($mock);
        $assetPrices = $economy->getAssetPrices();
        $this->assertEquals($result, $assetPrices);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetAssetPricesException()
    {
        $config = $this->getMockBuilder('\Steam\Configuration')
            ->disableOriginalConstructor()
            ->getMock();
        $config->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('getConfig')->will($this->returnValue($config));

        $economy = new Economy();
        $economy->setAdapter($mock);
        $economy->getAssetPrices();
    }

}
