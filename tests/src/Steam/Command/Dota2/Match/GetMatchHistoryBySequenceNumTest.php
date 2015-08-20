<?php

namespace Steam\Command\Dota2\Match;

use Steam\Command\CommandInterface;

class GetMatchHistoryBySequenceNumTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetMatchHistoryBySequenceNum
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new GetMatchHistoryBySequenceNum();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('GetMatchHistoryBySequenceNum', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IDOTA2Match_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IDOTA2Match_570', $this->instance->getInterface());
    }

    public function testSettingStartAtMatchSeqNum()
    {
        $this->instance->setStartAtMatchSeqNum(123);

        $this->assertEquals(['start_at_match_seq_num' => 123], $this->instance->getParams());
    }

    public function testSettingMatchesRequested()
    {
        $this->instance->setMatchesRequested(123);

        $this->assertEquals(['matches_requested' => 123], $this->instance->getParams());
    }

    public function testSettingSeqAndMatchesRequested()
    {
        $this->instance->setStartAtMatchSeqNum(123);
        $this->instance->setMatchesRequested(456);

        $this->assertEquals([
            'start_at_match_seq_num' => 123,
            'matches_requested' => 456,
        ], $this->instance->getParams());
    }
}
 