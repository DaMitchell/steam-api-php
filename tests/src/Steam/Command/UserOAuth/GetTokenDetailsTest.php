<?php

namespace Steam\Command\UserOAuth;

use Steam\Command\CommandInterface;

class GetTokenDetailsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTokenDetails
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetTokenDetails('access_token_string');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUserOAuth', $this->instance->getInterface());
        $this->assertEquals('GetTokenDetails', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['access_token' => 'access_token_string'], $this->instance->getParams());
    }
}
