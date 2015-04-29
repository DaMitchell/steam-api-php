<?php

namespace Steam\Command;

interface CommandInterface
{
    /**
     * @return string
     */
    public function getInterface();

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getVersion();

    /**
     * @return string
     */
    public function getRequestMethod();

    /**
     * @return array
     */
    public function getParams();
} 