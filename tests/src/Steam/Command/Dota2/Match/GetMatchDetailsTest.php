<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;

class GetMatchDetailsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetMatchDetails
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetMatchDetails(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetMatchDetails', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['match_id' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Match_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Match_570', $this->instance->getInterface());
    }
}
 