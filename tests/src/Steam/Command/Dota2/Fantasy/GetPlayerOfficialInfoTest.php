<?php

namespace Steam\Command\Dota2\Fantasy;

use Steam\Command\CommandInterface;

class GetPlayerOfficialInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetPlayerOfficialInfo
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetPlayerOfficialInfo(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetPlayerOfficialInfo', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['accountid' => 123], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Fantasy_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Fantasy_570', $this->instance->getInterface());
    }
}
