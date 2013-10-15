<?php

namespace Steam;

use Steam\Exception\InvalidConfigOptionException;

class Configuration
{
    /**
     * @var array
     */
    protected $_options = array(
        'steamKey' => '',
        'appId' => null
    );

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->setOptions($options);
    }

    public function setOptions(array $options)
    {
        foreach($options as $key => $value)
        {
            if(!array_key_exists($key, $this->_options))
            {
                throw new InvalidConfigOptionException(sprintf('"%s" is an invalid configuration option', $key));
            }

            $this->_options[$key] = $value;
        }
    }

    /**
     * @param string $appKey
     *
     * @return Configuration
     */
    public function setSteamKey($appKey)
    {
        $this->_options['steamKey'] = $appKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSteamKey()
    {
        return $this->_options['steamKey'];
    }

    /**
     * @param int $appId
     *
     * @return Configuration
     */
    public function setAppId($appId)
    {
        $this->_options['appId'] = (int) $appId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAppId()
    {
        return $this->_options['appId'];
    }

    /**
     * @return string
     */
    public function getBaseSteamApiUrl()
    {
        return 'http://api.steampowered.com/';
    }
}