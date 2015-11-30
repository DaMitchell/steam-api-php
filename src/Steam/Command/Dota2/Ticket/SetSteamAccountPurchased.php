<?php

namespace Steam\Command\Dota2\Ticket;
 
use Steam\Command\CommandInterface;

class SetSteamAccountPurchased implements CommandInterface
{
    /**
     * @var int
     */
    protected $eventId;

    /**
     * @var int
     */
    protected $steamId;

    /**
     * @param int $eventId
     * @param int $steamId
     */
    public function __construct($eventId, $steamId)
    {
        $this->eventId = $eventId;
        $this->steamId = $steamId;
    }

    public function getInterface()
    {
        return 'IDOTA2Ticket_570';
    }

    public function getMethod()
    {
        return 'SetSteamAccountPurchased';
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
        return [
            'eventid' => $this->eventId,
            'steamid' => $this->steamId,
        ];
    }
}
