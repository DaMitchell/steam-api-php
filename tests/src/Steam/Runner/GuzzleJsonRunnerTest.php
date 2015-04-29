<?php

namespace Steam\Runner;

use Mockery as M;

class GuzzleJsonRunnerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuzzleJsonRunner
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GuzzleJsonRunner();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testResultMustBeInstanceOfResponseInterface()
    {
        $this->instance->run(M::mock('Steam\Command\CommandInterface'), 'test result');
    }

    public function testJsonIsCalledOnResponseObject()
    {
        $result = ['a' => 'bc'];

        $response = M::mock('GuzzleHttp\Message\ResponseInterface');
        $response->shouldReceive('json')->andReturn($result)->once();

        $this->assertEquals($result, $this->instance->run(M::mock('Steam\Command\CommandInterface'), $response));

    }
}
 