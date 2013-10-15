<?php

namespace Steam\Adapter;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Client;

class Guzzle extends AdapterAbstract implements AdapterInterface
{
    /**
     * @var ClientInterface
     */
    protected $_client = null;

    /**
     * @param string $url
     * @param array $params
     * @param null $steamKey
     *
     * @return AdapterInterface
     */
    public function request($url, array $params = array(), $steamKey = null)
    {
        if(!is_null($steamKey))
        {
            $params['key'] = $steamKey;
        }

        $url .= '?' . http_build_query($params);

        $this->_rawBody = $this->getClient()->get($url)->send()->getBody();
        return $this;
    }

    /**
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client)
    {
        $this->_client = $client;
    }

    /**
     * @return ClientInterface
     */
    public function getClient()
    {
        if(is_null($this->_client))
        {
            $this->_client = new Client($this->getBaseSteamApiUrl());
        }

        return $this->_client;
    }
}