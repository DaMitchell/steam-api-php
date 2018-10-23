<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetSchemaItemsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetSchemaItems
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetSchemaItems(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetSchemaItems', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals(['language' => 'en'], $this->instance->getParams());
    }

    public function testSettingStartUpdatesInParams()
    {
        $this->instance->setStart(50);

        $this->assertEquals(['start' => 50], $this->instance->getParams());
    }
}
 