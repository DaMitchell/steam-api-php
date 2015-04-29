<?php

namespace Steam\Runner;

use Mockery as M;

class GuzzleRunnerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuzzleRunner
     */
    protected $instance;

    /**
     * @var M\MockInterface
     */
    protected $clientMock;

    /**
     * @var M\MockInterface
     */
    protected $urlBuilderMock;

    public function setUp()
    {
        $this->clientMock = M::mock('GuzzleHttp\ClientInterface');
        $this->urlBuilderMock = M::mock('Steam\Utility\UrlBuilderInterface');

        $this->instance = new GuzzleRunner($this->clientMock, $this->urlBuilderMock);

        $config = M::mock('Steam\Configuration', [
            'getBaseSteamApiUrl' => 'http://base.url.com',
        ]);

        $this->instance->setConfig($config);
    }

    public function testCallingRun()
    {
        $params = ['query' => ['a' => 'bc']];
        $url = 'http://base.url.com/built';

        $commandMock = M::mock('Steam\Command\CommandInterface', [
            'getParams' => $params['query'],
            'getRequestMethod' => 'GET',
        ]);

        $this->urlBuilderMock->shouldReceive('setBaseUrl')->with('http://base.url.com');
        $this->urlBuilderMock->shouldReceive('build')->andReturn($url);

        $request = M::mock('GuzzleHttp\Message\RequestInterface');
        $response = M::mock('GuzzleHttp\Message\ResponseInterface');

        $this->clientMock->shouldReceive('setDefaultOption')->with('future', true)->once();
        $this->clientMock->shouldReceive('createRequest')->with('GET', $url, $params)->andReturn($request)->once();
        $this->clientMock->shouldReceive('send')->with($request)->andReturn($response)->once();

        $this->assertEquals($response, $this->instance->run($commandMock));
    }
}
 