<?php

namespace Steam\Command\GameServersService;
 
use Steam\Command\CommandInterface;

class QueryLoginToken implements CommandInterface
{
    /**
     * @var string
     */
    protected $loginToken;

    /**
     * @param string $loginToken
     */
    public function __construct($loginToken)
    {
        $this->loginToken = $loginToken;
    }

    public function getInterface()
    {
        return 'IGameServersService';
    }

    public function getMethod()
    {
        return 'QueryLoginToken';
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
            'login_token' => $this->loginToken,
        ];
    }
}
