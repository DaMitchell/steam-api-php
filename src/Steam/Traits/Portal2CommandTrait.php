<?php

namespace Steam\Traits;

trait Portal2CommandTrait
{
    protected $isForBeta = false;

    /**
     * @param bool $value
     */
    public function isForBeta($value)
    {
        $this->isForBeta = (bool) $value;
    }

    public function getPortal2AppId()
    {
        return $this->isForBeta ? 841 : 620;
    }
} 