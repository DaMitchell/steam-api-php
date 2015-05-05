<?php

namespace Steam\Command\Economy;

use Steam\Command\CommandInterface;

class GetAssetClassInfo implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var array
     */
    protected $classIds;

    /**
     * @var array
     */
    protected $instanceIds;

    /**
     * @param int $appId
     * @param array $classIds
     * @param array $instanceIds
     */
    public function __construct($appId, array $classIds, array $instanceIds = [])
    {
        $this->appId = $appId;
        $this->classIds = $classIds;
        $this->instanceIds = $instanceIds;
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

    /**
     * @param array $instanceIds
     *
     * @return self
     */
    public function setInstanceIds(array $instanceIds)
    {
        $this->instanceIds = $instanceIds;
        return $this;
    }

    public function getInterface()
    {
        return 'ISteamEconomy';
    }

    public function getMethod()
    {
        return 'GetAssetClassInfo';
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
            'appid' => $this->appId,
            'class_count' => count($this->classIds),
        ];

        empty($this->language) ?: $params['language'] = $this->language;

        foreach($this->classIds as $key => $classId) {
            $params['classid' . $key] = $classId;
        }

        foreach($this->instanceIds as $key => $instanceId) {
            $params['instanceid' . $key] = $instanceId;
        }

        return $params;
    }
} 