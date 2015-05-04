<?php

namespace Steam;

use Steam\Exception\InvalidConfigOptionException;

class Configuration
{
    const STEAM_KEY = 'steam_key';

    /**
     * @var array
     */
    protected $_options = array(
        self::STEAM_KEY => '',
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
        $this->_options[self::STEAM_KEY] = $appKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSteamKey()
    {
        return $this->_options[self::STEAM_KEY];
    }

    /**
     * @return string
     */
    public function getBaseSteamApiUrl()
    {
        return 'http://api.steampowered.com';
    }
}