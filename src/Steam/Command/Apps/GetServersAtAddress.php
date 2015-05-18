<?php

namespace Steam\Command\Apps;
 
use Steam\Command\CommandInterface;

class GetServersAtAddress implements CommandInterface
{
    /**
     * @var string
     */
    protected $address;

    /**
     * @param string $address
     */
    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getInterface()
    {
        return 'ISteamApps';
    }

    public function getMethod()
    {
        return 'GetServersAtAddress';
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
            'addr' => $this->address,
        ];
    }
}
