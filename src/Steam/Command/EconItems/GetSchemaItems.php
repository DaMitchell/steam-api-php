<?php

namespace Steam\Command\EconItems;

use Steam\Command\CommandInterface;

class GetSchemaItems implements CommandInterface
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
     * @var string
     */
    protected $start;

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

    /**
     * The first item id to return. Defaults to 0. Response will indicate next value to query if applicable.
     *
     * @param int $start
     *
     * @return self
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    public function getInterface()
    {
        return 'IEconItems_' . $this->appId;
    }

    public function getMethod()
    {
        return 'GetSchemaItems';
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
        $params['start'] = $this->start ?: 0;

        return $params;
    }
} 