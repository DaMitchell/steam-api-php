<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetStoreMetaData implements CommandInterface
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
     * @param int $appId
     */
    public function __construct($appId)
    {
        $this->appId = $appId;
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
        return 'IEconItems_' . $this->appId;
    }

    public function getMethod()
    {
        return 'GetStoreMetaData';
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
        $params = [];

        empty($this->language) ?: $params['language'] = $this->language;

        return $params;
    }
} 