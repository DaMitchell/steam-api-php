<?php
namespace Steam;

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Api\Apps;

class AppsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAppList()
    {
        $adapter = new Guzzle();
        $adapter->setSerializer(SerializerBuilder::create()->build());
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C'
        );
        $config = new Configuration($options);

        $apps = new Apps($config);
        $apps->setAdapter($adapter);
        $appsList = $apps->getAppList();
        $this->assertArrayHasKey('applist', $appsList);
    }

    public function testUpToDateCheck()
    {
    }

}