<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetStoreMetaDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetStoreMetaData
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetStoreMetaData(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetStoreMetaData', $this->instance->getMethod());
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
 