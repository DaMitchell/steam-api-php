<?php

namespace Steam\Utility;

use Mockery as M;

class GuzzleUrlBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuzzleUrlBuilder
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GuzzleUrlBuilder();
    }

    public function testUrlIsReturnedAndInTheCorrectFormat()
    {
        $baseUrl = 'http://base.url.com';

        $commandMock = M::mock('Steam\Command\CommandInterface', [
                'getInterface' => 'testInterface',
                'getMethod' => 'testMethod',
                'getVersion' => 'testVersion',
            ]);

        $uri = $this->instance->setBaseUrl($baseUrl)->build($commandMock);

        $this->assertInstanceOf('GuzzleHttp\Psr7\Uri', $uri);

        $this->assertEquals('base.url.com', $uri->getHost());
        $this->assertEquals('http', $uri->getScheme());
        $this->assertEquals('/testInterface/testMethod/testVersion', $uri->getPath());
    }
}
 