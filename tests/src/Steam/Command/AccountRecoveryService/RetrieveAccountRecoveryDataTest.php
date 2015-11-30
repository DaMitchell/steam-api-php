<?php

namespace Steam\Command\AccountRecoveryService;

use Steam\Command\CommandInterface;

class RetrieveAccountRecoveryDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RetrieveAccountRecoveryData
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new RetrieveAccountRecoveryData(
            'requestHandle'
        );
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IAccountRecoveryService', $this->instance->getInterface());
        $this->assertEquals('RetrieveAccountRecoveryData', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'requesthandle' =>  'requestHandle',
        ], $this->instance->getParams());
    }
}
