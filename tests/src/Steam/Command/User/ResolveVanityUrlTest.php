<?php

namespace Steam\Command\User;

use Steam\Command\CommandInterface;

class ResolveVanityUrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResolveVanityUrl
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new ResolveVanityUrl('http://vanity.url');
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('ResolveVanityURL', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'vanityurl' => 'http://vanity.url',
            'url_type' => ResolveVanityUrl::INDIVIDUAL_PROFILE,
            ], $this->instance->getParams());
    }

    public function testSettingUrlTypeChangesParamValues()
    {
        $instance = new ResolveVanityUrl('http://vanity.url', ResolveVanityUrl::GROUP);

        $this->assertEquals([
            'vanityurl' => 'http://vanity.url',
            'url_type' => ResolveVanityUrl::GROUP,
        ], $instance->getParams());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPassingInIncorrectUrlTypeThrowsException()
    {
        new ResolveVanityUrl('http://vanity.url', 4);
    }
}
 