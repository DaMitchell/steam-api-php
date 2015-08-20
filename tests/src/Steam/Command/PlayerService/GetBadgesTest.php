<?php

namespace Steam\Command\PlayerService;

use Steam\Command\CommandInterface;

class GetBadgesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetBadges
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetBadges(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetBadges', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['steamid' => 123], $this->instance->getParams());
    }
}
 