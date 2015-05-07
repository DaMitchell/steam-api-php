<?php

namespace Steam\Command\PlayerService;

class GetCommunityBadgeProgressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetCommunityBadgeProgress
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetCommunityBadgeProgress(123, 456);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetCommunityBadgeProgress', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'steamid' => 123,
            'badgeid' => 456,
        ], $this->instance->getParams());
    }
}
 