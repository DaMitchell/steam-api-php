<?php

namespace Steam\Command\TeamFortressItems;

class GetGoldenWrenchesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetGoldenWrenches
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetGoldenWrenches();
    }

    public function testValues()
    {
        $this->assertEquals('ITFItems_440', $this->instance->getInterface());
        $this->assertEquals('GetGoldenWrenches', $this->instance->getMethod());
        $this->assertEquals('v2', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }
}
 