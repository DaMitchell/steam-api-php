<?php

namespace Steam;

use Mockery as M;

class SteamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Steam
     */
    protected $instance;

    /**
     * @var Configuration
     */
    protected $config;

    public function setUp()
    {
        $this->config = new Configuration();
        $this->instance = new Steam($this->config);
    }

    public function testAddingOneRunner()
    {
        $commandMock = M::mock('Steam\Command\CommandInterface');

        $result = 'called';

        $runnerMock = M::mock('Steam\Runner\RunnerInterface');
        $runnerMock->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMock->shouldReceive('run')->with($commandMock, null)->andReturn($result)->once();

        $this->instance->addRunner($runnerMock);

        $this->assertEquals($result, $this->instance->run($commandMock));
    }

    public function testAddingOneRunnerFromArray()
    {
        $commandMock = M::mock('Steam\Command\CommandInterface');

        $result = 'called';

        $runnerMock = M::mock('Steam\Runner\RunnerInterface');
        $runnerMock->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMock->shouldReceive('run')->with($commandMock, null)->andReturn($result)->once();

        $this->instance->addRunners([$runnerMock]);

        $this->assertEquals($result, $this->instance->run($commandMock));
    }

    public function testAddingTwoRunners()
    {
        $commandMock = M::mock('Steam\Command\CommandInterface');

        $resultOne = 'called';
        $resultTwo = 'called second';

        $runnerMockOne = M::mock('Steam\Runner\RunnerInterface');
        $runnerMockOne->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockOne->shouldReceive('run')->with($commandMock, null)->andReturn($resultOne)->once();

        $runnerMockTwo = M::mock('Steam\Runner\RunnerInterface');
        $runnerMockTwo->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockTwo->shouldReceive('run')->with($commandMock, $resultOne)->andReturn($resultTwo)->once();

        $this->instance->addRunner($runnerMockOne);
        $this->instance->addRunner($runnerMockTwo);

        $this->assertEquals($resultTwo, $this->instance->run($commandMock));
    }

    public function testAddingTwoRunnersFromArray()
    {
        $commandMock = M::mock('Steam\Command\CommandInterface');

        $resultOne = 'called';
        $resultTwo = 'called second';

        $runnerMockOne = M::mock('Steam\Runner\RunnerInterface');
        $runnerMockOne->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockOne->shouldReceive('run')->with($commandMock, null)->andReturn($resultOne)->once();

        $runnerMockTwo = M::mock('Steam\Runner\RunnerInterface');
        $runnerMockTwo->shouldReceive('setConfig')->with($this->config)->andReturnSelf()->once();
        $runnerMockTwo->shouldReceive('run')->with($commandMock, $resultOne)->andReturn($resultTwo)->once();

        $this->instance->addRunners([$runnerMockOne, $runnerMockTwo]);

        $this->assertEquals($resultTwo, $this->instance->run($commandMock));
    }

    public function testGettingAndSettingConfig()
    {
        $config = new Configuration();

        $this->assertEquals($this->instance, $this->instance->setConfig($config));
        $this->assertEquals($config, $this->instance->getConfig());
    }
}
 