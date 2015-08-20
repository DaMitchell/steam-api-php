<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;

class GetEmoticonsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetEmoticons
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetEmoticons();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
        $this->assertEquals('GetEmoticons', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 