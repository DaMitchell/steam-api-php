<?php

namespace Steam;

use Steam\Adapter\AdapterInterface;
use Steam\Api\Exception\NoAdapterSetException;

class SteamInterface
{
    /**
     * @var AdapterInterface
     */
    protected $_adapter = null;

    /**
     * @var Configuration
     */
    protected $_config = null;

    /**
     * @param Configuration $config
     */
    public function __construct(Configuration $config = null)
    {
        if(!is_null($config))
        {
            $this->setConfig($config);
        }
    }

    /**
     * @param Configuration $config
     *
     * @return SteamInterface
     */
    public function setConfig(Configuration $config)
    {
        $this->_config = $config;
        return $this;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * @param AdapterInterface $adapter
     *
     * @return SteamInterface
     */
    public function setAdapter(Adapter\AdapterInterface $adapter)
    {
        $this->_adapter = $adapter->setBaseSteamApiUrl($this->getConfig()->getBaseSteamApiUrl());
        return $this;
    }

    /**
     * @throws NoAdapterSetException
     * @return AdapterInterface
     */
    public function getAdapter()
    {
        if(is_null($this->_adapter))
        {
            throw new NoAdapterSetException('You need to set an adapter before you can use it.');
        }

        return $this->_adapter;
    }
}