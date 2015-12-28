<?php

namespace Steam\Runner;

use Mockery as M;

class DecodeJsonStringRunnerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DecodeJsonStringRunner
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new DecodeJsonStringRunner();
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
        $resultString = '{"a":"bc"}';
        $resultArray = ['a' => 'bc'];

        $stream = M::mock('Psr\Http\Message\StreamInterface');
        $stream->shouldReceive('getContents')->andReturn($resultString)->once();

        $response = M::mock('Psr\Http\Message\ResponseInterface');
        $response->shouldReceive('getBody')->andReturn($stream)->once();

        $this->assertEquals($resultArray, $this->instance->run(M::mock('Steam\Command\CommandInterface'), $response));

    }
}
 