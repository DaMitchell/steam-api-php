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

    /**
     * @var M\MockInterface
     */
    protected $configMock;

    public function setUp()
    {
        $this->clientMock = M::mock('GuzzleHttp\ClientInterface');
        $this->urlBuilderMock = M::mock('Steam\Utility\UrlBuilderInterface');

        $this->instance = new GuzzleRunner($this->clientMock, $this->urlBuilderMock);

        $this->configMock = M::mock('Steam\Configuration', [
            'getBaseSteamApiUrl' => 'http://base.url.com',
        ]);

        $this->instance->setConfig($this->configMock);
    }

    public function testCallingRun()
    {
        $params = ['query' => ['a' => 'bc']];
        $url = 'http://base.url.com/built';

        $commandMock = M::mock('Steam\Command\CommandInterface', [
            'getParams' => $params['query'],
            'getRequestMethod' => 'GET',
        ]);

        $this->configMock->shouldReceive('getSteamKey')->andReturn('');
        $this->configMock->shouldReceive('getLanguage')->andReturn('');

        $this->urlBuilderMock->shouldReceive('setBaseUrl')->with('http://base.url.com');
        $this->urlBuilderMock->shouldReceive('build')->andReturn($url);

        $request = M::mock('GuzzleHttp\Message\RequestInterface');
        $response = M::mock('GuzzleHttp\Message\ResponseInterface');

        $this->clientMock->shouldReceive('setDefaultOption')->with('future', true)->once();
        $this->clientMock->shouldReceive('createRequest')->with('GET', $url, $params)->andReturn($request)->once();
        $this->clientMock->shouldReceive('send')->with($request)->andReturn($response)->once();

        $this->assertEquals($response, $this->instance->run($commandMock));
    }

    public function testCallingRunThatWillIncludeSteamKey()
    {
        $commandParams = ['a' => 'bc'];
        $url = 'http://base.url.com/built';
        $steamKey = 'test_steam_key';
        $language = 'en';

        $options = ['query' => array_merge($commandParams, [
            'key' => $steamKey,
            'language' => $language,
        ])];

        $commandMock = M::mock('Steam\Command\CommandInterface', [
                'getParams' => $commandParams,
                'getRequestMethod' => 'GET',
            ]);

        $this->configMock->shouldReceive('getSteamKey')->andReturn($steamKey);
        $this->configMock->shouldReceive('getLanguage')->andReturn($language);

        $this->urlBuilderMock->shouldReceive('setBaseUrl')->with('http://base.url.com');
        $this->urlBuilderMock->shouldReceive('build')->andReturn($url);

        $request = M::mock('GuzzleHttp\Message\RequestInterface');
        $response = M::mock('GuzzleHttp\Message\ResponseInterface');

        $this->clientMock->shouldReceive('setDefaultOption')->with('future', true)->once();
        $this->clientMock->shouldReceive('createRequest')->with('GET', $url, $options)->andReturn($request)->once();
        $this->clientMock->shouldReceive('send')->with($request)->andReturn($response)->once();

        $this->assertEquals($response, $this->instance->run($commandMock));
    }
}
 