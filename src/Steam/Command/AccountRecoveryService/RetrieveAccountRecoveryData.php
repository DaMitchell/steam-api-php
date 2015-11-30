<?php

namespace Steam\Command\AccountRecoveryService;
 
use Steam\Command\CommandInterface;

class RetrieveAccountRecoveryData implements CommandInterface
{
    /**
     * @var string
     */
    protected $requestHandle;

    /**
     * @param string $requestHandle
     */
    public function __construct($requestHandle)
    {
        $this->requestHandle = $requestHandle;
    }

    public function getInterface()
    {
        return 'IAccountRecoveryService';
    }

    public function getMethod()
    {
        return 'RetrieveAccountRecoveryData';
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
            'requesthandle' => $this->requestHandle,
        ];

        return $params;
    }
}
