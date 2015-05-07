<?php

namespace Steam\Command\Dota2\Match;

class GetLeagueListingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetLeagueListing
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetLeagueListing();
    }

    public function testValues()
    {
        $this->assertEquals('GetLeagueListing', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
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
 