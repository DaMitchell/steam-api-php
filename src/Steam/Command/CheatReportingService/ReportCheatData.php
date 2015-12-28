<?php

namespace Steam\Command\CheatReportingService;
 
use Steam\Command\CommandInterface;

class ReportCheatData implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var int
     */
    protected $appId;

    /**
     * @var string
     */
    protected $pathAndFileName;

    /**
     * @var string
     */
    protected $webCheatUrl;

    /**
     * @var int
     */
    protected $timeNow;

    /**
     * @var int
     */
    protected $timeStarted;

    /**
     * @var int
     */
    protected $timeStopped;

    /**
     * @var string
     */
    protected $cheatName;

    /**
     * @var int
     */
    protected $gameProcessId;

    /**
     * @var int
     */
    protected $cheatProcessId;

    /**
     * @param int $steamId
     * @param int $appId
     * @param string $pathAndFileName
     * @param string $webCheatUrl
     * @param \DateTime $timeNow
     * @param \DateTime $timeStarted
     * @param \DateTime $timeStopped
     * @param string $cheatName
     * @param int $gameProcessId
     * @param int $cheatProcessId
     */
    public function __construct(
        $steamId,
        $appId,
        $pathAndFileName,
        $webCheatUrl,
        $timeNow,
        $timeStarted,
        $timeStopped,
        $cheatName,
        $gameProcessId,
        $cheatProcessId
    ) {
        $this->steamId = $steamId;
        $this->appId = $appId;
        $this->pathAndFileName = $pathAndFileName;
        $this->webCheatUrl = $webCheatUrl;
        $this->timeNow = $timeNow;
        $this->timeStarted = $timeStarted;
        $this->timeStopped = $timeStopped;
        $this->cheatName = $cheatName;
        $this->gameProcessId = $gameProcessId;
        $this->cheatProcessId = $cheatProcessId;
    }

    public function getInterface()
    {
        return 'IAccountRecoveryService';
    }

    public function getMethod()
    {
        return 'ReportAccountRecoveryData';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'POST';
    }

    public function getParams()
    {
        $params = [
            'steamid' => $this->steamId,
            'appid' => $this->appId,
            'pathandfilename' => $this->pathAndFileName,
            'webcheaturl' => $this->webCheatUrl,
            'time_now' => $this->timeNow->getTimestamp(),
            'time_started' => $this->timeStarted->getTimestamp(),
            'time_stopped' => $this->timeStopped->getTimestamp(),
            'cheatname' => $this->cheatName,
            'game_process_id' => $this->gameProcessId,
            'cheat_process_id' => $this->cheatProcessId,
        ];

        return $params;
    }
}
