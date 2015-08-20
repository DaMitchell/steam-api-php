<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetEventStatsForAccount implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $eventId;

    /**
     * @var int
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $language;

    /**
     * @param int $eventId
     * @param int $accountId
     */
    public function __construct($eventId, $accountId)
    {
        $this->eventId = (int) $eventId;
        $this->accountId = (int) $accountId;
    }

    /**
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    public function getInterface()
    {
        return 'IEconDOTA2_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetEventStatsForAccount';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        $params = [
            'eventid' => $this->eventId,
            'accountid' => $this->accountId,
        ];

        empty($this->language) ?: $params['language'] = $this->language;

        return $params;
    }
} 