<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;

class GetTournamentPrizePoolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetItemIconPath
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetTournamentPrizePool(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetTournamentPrizePool', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['leagueid' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IEconDOTA2_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
    }
}
 