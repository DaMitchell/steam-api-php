<?php
namespace Steam;

use Steam\Api\News;

class NewsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetNewsForApp()
    {
        $appId = 1;
        $result = array(
            'appid' => $appId,
            'newsitems' => array(
                'gid' => 42,
                'title' => 'title',
                'url' => 'url',
                'is_external_url' => false,
                'author' => 'author',
                'contents' => 'contents',
                'feedlabel' => 'feedlabel',
                'date' => 1234567890,
                'feedname' => 'feedname',
            )
        );

        $config = $this->getMockBuilder('\Steam\Configuration')
            ->disableOriginalConstructor()
            ->getMock();
        $config->expects($this->once())->method('getAppId')->will($this->returnValue($appId));

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('request')->will($this->returnSelf());
        $mock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));
        $mock->expects($this->once())->method('getConfig')->will($this->returnValue($config));

        $news = new News();
        $news->setAdapter($mock);
        $list = $news->getNewsForApp();
        $this->assertEquals($result, $list);
    }

    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testGetNewsForAppException()
    {
        $config = $this->getMockBuilder('\Steam\Configuration')
            ->disableOriginalConstructor()
            ->getMock();
        $config->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $mock = $this->getMockBuilder('\Steam\Adapter\Guzzle')
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())->method('getConfig')->will($this->returnValue($config));

        $news = new News();
        $news->setAdapter($mock);
        $news->getNewsForApp();
    }

}
