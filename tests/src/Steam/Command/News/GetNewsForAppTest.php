<?php

namespace Steam\Command\News;

use Steam\Command\CommandInterface;

class GetNewsForAppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetNewsForApp
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetNewsForApp(570);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamNews', $this->instance->getInterface());
        $this->assertEquals('GetNewsForApp', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testDefaultParamsValue()
    {
        $this->assertEquals([
            'appid' => 570,
            'count' => 20,
        ], $this->instance->getParams());
    }

    public function testSettingValuesAltersParams()
    {
        $date = new \DateTime();

        $this->instance->setMaxLength(200);
        $this->instance->setEndDate($date);
        $this->instance->setCount(10);
        $this->instance->setFeeds(['test', 'one']);

        $this->assertEquals([
            'appid' => 570,
            'maxlength' => 200,
            'enddate' => $date->getTimestamp(),
            'count' => 10,
            'feeds' => 'test,one',
        ], $this->instance->getParams());
    }
}
 