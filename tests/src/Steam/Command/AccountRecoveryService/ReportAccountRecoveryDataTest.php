<?php

namespace Steam\Command\AccountRecoveryService;

use Steam\Command\CommandInterface;

class ReportAccountRecoveryDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ReportAccountRecoveryData
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new ReportAccountRecoveryData(
            'loginUserList',
            'installConfig',
            'shaSentryFile',
            'machineId'
        );
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IAccountRecoveryService', $this->instance->getInterface());
        $this->assertEquals('ReportAccountRecoveryData', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('POST', $this->instance->getRequestMethod());
        $this->assertEquals([
            'loginuser_list' =>  'loginUserList',
            'install_config' => 'installConfig',
            'shasentryfile' => 'shaSentryFile',
            'machineid' => 'machineId',
        ], $this->instance->getParams());
    }
}
