<?php

namespace Steam\Command\AccountRecoveryService;
 
use Steam\Command\CommandInterface;

class ReportAccountRecoveryData implements CommandInterface
{
    /**
     * @var string
     */
    protected $loginUserList;

    /**
     * @var string
     */
    protected $installConfig;

    /**
     * @var string
     */
    protected $shaSentryFile;

    /**
     * @var string
     */
    protected $machineId;

    /**
     * @param string $loginUserList
     * @param string $installConfig
     * @param string $shaSentryFile
     * @param string $machineId
     */
    public function __construct($loginUserList, $installConfig, $shaSentryFile, $machineId)
    {
        $this->loginUserList = $loginUserList;
        $this->installConfig = $installConfig;
        $this->shaSentryFile = $shaSentryFile;
        $this->machineId = $machineId;
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
            'loginuser_list' => $this->loginUserList,
            'install_config' => $this->installConfig,
            'shasentryfile' => $this->shaSentryFile,
            'machineid' => $this->machineId,
        ];

        return $params;
    }
}
