<?php
namespace Steam;

use JMS\Serializer\SerializerBuilder;
use Steam\Adapter\Guzzle;
use Steam\Api\Apps;

class AppsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAppList()
    {
        $options = array(
            'steamKey' => 'A88F8BADC002DCE760B1F9D095B8FB3C'
        );
        $config = new Configuration($options);

        $adapter = new Guzzle($config);
        $adapter->setSerializer(SerializerBuilder::create()->build());

        $apps = new Apps($config);
        $apps->setAdapter($adapter);
        $appsList = $apps->getAppList();
        $this->assertArrayHasKey('applist', $appsList);
    }

    public function testUpToDateCheck()
    {
    }

}