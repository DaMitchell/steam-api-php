<?php

namespace Steam\Command\UserOAuth;

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

    public function testValues()
    {
        $this->assertEquals('ISteamUserOAuth', $this->instance->getInterface());
        $this->assertEquals('GetTokenDetails', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['access_token' => 'access_token_string'], $this->instance->getParams());
    }
}
