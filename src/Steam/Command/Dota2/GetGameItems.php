<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetGameItems implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var string
     */
    protected $language;

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
        return 'IEconDOTA2_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetGameItems';
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