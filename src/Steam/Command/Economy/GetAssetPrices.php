<?php

namespace Steam\Command\Economy;

use Steam\Command\CommandInterface;

class GetAssetPrices implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $language;

    /**
     * @param int $appId
     * @param string $currency
     */
    public function __construct($appId, $currency = '')
    {
        $this->appId = $appId;
        $this->currency = $currency;
    }

    /**
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getInterface()
    {
        return 'ISteamEconomy';
    }

    public function getMethod()
    {
        return 'GetAssetPrices';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        $params = [
            'appid' => $this->appId,
        ];

        empty($this->currency) ?: $params['currency'] = $this->currency;
        empty($this->language) ?: $params['language'] = $this->language;

        return $params;
    }
} 