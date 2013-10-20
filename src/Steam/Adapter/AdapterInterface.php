<?php

namespace Steam\Adapter;

use Steam\Configuration;

interface AdapterInterface
{
    /**
     * @param Configuration $config
     *
     * @return AdapterInterface
     */
    public function setConfig(Configuration $config);

    /**
     * @return Configuration
     */
    public function getConfig();

    /**
     * @param string $url
     * @param array $params
     *
     * @return AdapterInterface
     */
    public function request($url, array $params = array());

    /**
     * @return string
     */
    public function getRawBody();

    /**
     * @return mixed
     */
    public function getParsedBody();
}