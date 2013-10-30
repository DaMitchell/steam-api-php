<?php

namespace Steam;

use Steam\Adapter\AdapterInterface;
use Steam\Api\Exception\NoAdapterSetException;
use Steam\Api\Exception\InsufficientParameters;

abstract class Steam
{
    /**
     * @var AdapterInterface
     */
    protected $_adapter = null;

    /**
     * @param AdapterInterface $adapter
     *
     * @return Steam
     */
    public function setAdapter(Adapter\AdapterInterface $adapter)
    {
        $this->_adapter = $adapter;
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