<?php

namespace Steam\Command\UserAuth;
 
use Steam\Command\CommandInterface;

class AuthenticateUserTicket implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var string
     */
    protected $ticket;

    /**
     * @param int $appId
     * @param string $ticket
     */
    public function __construct($appId, $ticket)
    {
        $this->appId = $appId;
        $this->ticket = $ticket;
    }

    public function getInterface()
    {
        return 'ISteamUserAuth';
    }

    public function getMethod()
    {
        return 'AuthenticateUserTicket';
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
            'appid' => $this->appId,
            'ticket' => $this->ticket,
        ];
    }
}
