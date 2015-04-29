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

    public function testAnArrayIsReturnedAndCorrectlyFormatted()
    {
        $commandMock = M::mock('Steam\Command\CommandInterface', [
            'getInterface' => 'testInterface',
            'getMethod' => 'testMethod',
            'getVersion' => 'testVersion',
        ]);

        $expected = ['/{interface}/{method}/{version}', [
            'interface' => 'testInterface',
            'method' => 'testMethod',
            'version' => 'testVersion',
        ]];

        $this->assertEquals($expected, $this->instance->build($commandMock));
    }

    public function testSettingBaseUrlAltersResultWithLeadingSlash()
    {
        $baseUrl = 'http://base.url.com/';

        $commandMock = M::mock('Steam\Command\CommandInterface', [
                'getInterface' => 'testInterface',
                'getMethod' => 'testMethod',
                'getVersion' => 'testVersion',
            ]);

        $expected = [rtrim($baseUrl, '/') . '/{interface}/{method}/{version}', [
            'interface' => 'testInterface',
            'method' => 'testMethod',
            'version' => 'testVersion',
        ]];

        $this->assertEquals($expected, $this->instance->setBaseUrl($baseUrl)->build($commandMock));
    }

    public function testSettingBaseUrlAltersResultWithoutLeadingSlash()
    {
        $baseUrl = 'http://base.url.com';

        $commandMock = M::mock('Steam\Command\CommandInterface', [
                'getInterface' => 'testInterface',
                'getMethod' => 'testMethod',
                'getVersion' => 'testVersion',
            ]);

        $expected = [$baseUrl . '/{interface}/{method}/{version}', [
            'interface' => 'testInterface',
            'method' => 'testMethod',
            'version' => 'testVersion',
        ]];

        $this->assertEquals($expected, $this->instance->setBaseUrl($baseUrl)->build($commandMock));
    }
}
 