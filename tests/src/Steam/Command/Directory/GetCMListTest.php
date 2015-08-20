<?php
/**
 * Created by IntelliJ IDEA.
 * User: daniel
 * Date: 18/05/2015
 * Time: 23:21
 */

namespace Steam\Command\Directory;

use Steam\Command\CommandInterface;

class GetCMListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetCMList
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetCMList(123);
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamDirectory', $this->instance->getInterface());
        $this->assertEquals('GetCMList', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['cellid' => 123], $this->instance->getParams());
    }

    public function testSettingMaxCount()
    {
        $this->instance->setMaxCount(2);

        $this->assertEquals([
            'cellid' => 123,
            'maxcount' => 2
        ], $this->instance->getParams());
    }
}
