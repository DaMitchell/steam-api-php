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

class AdapterAbstract
{
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
     * @param string $url
     *
     * @return AdapterInterface
     */
    public function setBaseSteamApiUrl($url)
    {
        $this->_baseSteamApi = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseSteamApiUrl()
    {
        return $this->_baseSteamApi;
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