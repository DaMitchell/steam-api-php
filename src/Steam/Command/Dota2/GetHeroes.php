<?php

namespace Steam\Command\Dota2;

use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetHeroes implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var bool
     */
    protected $itemizedHeroesOnly = false;

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

    /**
     * @param bool $itemizedHeroesOnly
     *
     * @return self
     */
    public function setItemizedHeroesOnly($itemizedHeroesOnly)
    {
        $this->itemizedHeroesOnly = (bool) $itemizedHeroesOnly;
        return $this;
    }

    public function getInterface()
    {
        return 'IEconDOTA2_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetHeroes';
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
        is_null($this->itemizedHeroesOnly) ?: $params['itemizedonly'] = $this->itemizedHeroesOnly;

        return $params;
    }
} 