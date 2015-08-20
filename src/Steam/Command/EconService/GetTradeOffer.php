<?php

namespace Steam\Command\EconService;
 
use Steam\Command\CommandInterface;

class GetTradeOffer implements CommandInterface
{
    /**
     * @var int
     */
    protected $tradeOfferId;

    /**
     * @var string
     */
    protected $language;

    /**
     * @param string $tradeOfferId
     */
    public function __construct($tradeOfferId)
    {
        $this->tradeOfferId = $tradeOfferId;
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

    public function getInterface()
    {
        return 'IEconService';
    }

    public function getMethod()
    {
        return 'GetTradeOffer';
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
            'tradeofferid' => $this->tradeOfferId,
        ];

        empty($this->language) ?: $params['language'] = $this->language;

        return $params;
    }
}
