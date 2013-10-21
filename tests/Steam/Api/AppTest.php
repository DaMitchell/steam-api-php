<?php
namespace Steam;

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Api\Apps;

class AppsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAppList()
    {
        $result = array(
            'applist' => array(
                'apps' => array(
                    array(
                        'appid' => 9568333,
                        'name' => 'app test',
                    ),
                    array(
                        'appid' => 9568333,
                        'name' => 'app test 2',
                    ),
                )
            )
        );

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());
        $mock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $apps = new Apps();
        $apps->setAdapter($mock);
        $appList = $apps->getAppList();
        $this->assertEquals($result, $appList);
    }

    public function testUpToDateCheck()
    {
    }

}