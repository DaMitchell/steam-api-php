<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;

class GetEmoticonAccessForUser implements CommandInterface
{
    /**
     * @var int
     */
    protected $eventId;

    /**
     * @param int $eventId
     */
    public function __construct($eventId)
    {
        $this->eventId = (int) $eventId;
    }

    public function getInterface()
    {
        return 'IEconDOTA2_570';
    }

    public function getMethod()
    {
        return 'GetEmoticonAccessForUser';
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
        return [
            'steamid' => $this->eventId,
        ];
    }
} 