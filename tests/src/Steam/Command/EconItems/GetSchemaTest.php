<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetSchemaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetSchema
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetSchema(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetSchema', $this->instance->getMethod());
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
 