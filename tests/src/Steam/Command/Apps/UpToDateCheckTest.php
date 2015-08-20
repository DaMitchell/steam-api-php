<?php

namespace Steam\Command\Apps;

use Steam\Command\CommandInterface;

class UpToDateCheckTest extends \PHPUnit_Framework_TestCase
{

    public function testImplementsInterface()
    {
        $appId = 570;
        $version = 123;
        $instance = new UpToDateCheck($appId, $version);

        $this->assertTrue($instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $appId = 570;
        $version = 123;
        $instance = new UpToDateCheck($appId, $version);

        $this->assertEquals('ISteamApps', $instance->getInterface());
        $this->assertEquals('UpToDateCheck', $instance->getMethod());
        $this->assertEquals('v1', $instance->getVersion());
        $this->assertEquals('GET', $instance->getRequestMethod());
        $this->assertEquals([
            'appId' => $appId,
            'version' => $version,
        ], $instance->getParams());
    }

    public function testParamsWithStringsPassedIn()
    {
        $appId = '570';
        $version = '123';
        $instance = new UpToDateCheck($appId, $version);

        $this->assertEquals([
            'appId' => 570,
            'version' => 123,
        ], $instance->getParams());
    }
}
 