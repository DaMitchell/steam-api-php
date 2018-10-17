<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetSchemaOverviewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetSchemaOverview
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetSchemaOverview(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetSchemaOverview', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals(['language' => 'en'], $this->instance->getParams());
    }
}
 