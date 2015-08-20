<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;

class GetEventStatsForAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetEventStatsForAccount
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetEventStatsForAccount(123, 456);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetEventStatsForAccount', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'eventid' => 123,
            'accountid' => 456,
        ], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IEconDOTA2_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'eventid' => 123,
            'accountid' => 456,
            'language' => 'en'
        ], $this->instance->getParams());
    }
}
 