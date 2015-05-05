<?php

namespace Steam\Command\CSGOServers;

class GetGameServersStatusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetGameServersStatus
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetGameServersStatus();
    }

    public function testValues()
    {
        $this->assertEquals('ICSGOServers_730', $this->instance->getInterface());
        $this->assertEquals('GetGameServersStatus', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 