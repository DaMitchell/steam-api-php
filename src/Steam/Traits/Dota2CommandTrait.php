<?php

namespace Steam\Traits;

trait Dota2CommandTrait
{
    protected $isForTestClient = false;

    /**
     * @param bool $value
     */
    public function isForTestClient($value)
    {
        $this->isForTestClient = (bool) $value;
    }

    public function getDota2AppId()
    {
        return $this->isForTestClient ? 205790 : 570;
    }
} 