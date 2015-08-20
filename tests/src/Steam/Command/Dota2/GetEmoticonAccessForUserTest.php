<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;

class GetEmoticonAccessForUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetEmoticonAccessForUser
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetEmoticonAccessForUser(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
        $this->assertEquals('GetEmoticonAccessForUser', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 123], $this->instance->getParams());
    }
}
 