<?php

namespace Steam\Command\UserOAuth;
 
use Steam\Command\CommandInterface;

class GetTokenDetails implements CommandInterface
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @param string $accessToken
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getInterface()
    {
        return 'ISteamUserOAuth';
    }

    public function getMethod()
    {
        return 'GetTokenDetails';
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
            'access_token' => $this->accessToken,
        ];
    }
}
