<?php

namespace Steam\Runner;

use Steam\Configuration;

abstract class AbstractRunner
{
    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param Configuration $config
     *
     * @return self
     */
    public function setConfig(Configuration $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }
} 