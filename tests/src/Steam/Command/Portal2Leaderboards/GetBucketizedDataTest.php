<?php

namespace Steam\Command\Portal2Leaderboards;

use Steam\Command\CommandInterface;

class GetBucketizedDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetBucketizedData
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetBucketizedData('test');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetBucketizedData', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['leaderboardName' => 'test'], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForBeta(true);
        $this->assertEquals('IPortal2Leaderboards_841', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForBeta(false);
        $this->assertEquals('IPortal2Leaderboards_620', $this->instance->getInterface());
    }
}
