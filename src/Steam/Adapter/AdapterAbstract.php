<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dan
 * Date: 27/06/13
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */

namespace Steam\Adapter;

use JMS\Serializer\Serializer;
use Steam\Configuration;

class AdapterAbstract
{
    /**
     * @var Configuration
     */
    protected $_config = null;

    /**
     * @var string
     */
    protected $_baseSteamApi = '';

    /**
     * @var string
     */
    protected $_rawBody = '';

    /**
     * @var mixed
     */
    protected $_parsedBody = '';

    /**
     * @var Serializer
     */
    protected $_serializer = null;

    /**
     * @param Configuration $config
     */
    public function __construct(Configuration $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param Configuration $config
     *
     * @return AdapterInterface
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
     * @param Serializer $serializer
     */
    public function setSerializer(Serializer $serializer)
    {
        $this->_serializer = $serializer;
    }

    /**
     * @return Serializer
     */
    public function getSerializer()
    {
        return $this->_serializer;
    }

    /**
     * @return string
     */
    public function getRawBody()
    {
        return $this->_rawBody;
    }

    /**
     * @return mixed
     */
    public function getParsedBody()
    {
        return $this->getSerializer()->deserialize($this->getRawBody(), 'array', 'json');
    }
}