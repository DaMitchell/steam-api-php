<?php

namespace Steam\Command\EconService;
 
use Steam\Command\CommandInterface;

class CancelTradeOffer implements CommandInterface
{
    /**
     * @var int
     */
    protected $tradeOfferId;

    /**
     * @param string $tradeOfferId
     */
    public function __construct($tradeOfferId)
    {
        $this->tradeOfferId = $tradeOfferId;
    }

    public function getInterface()
    {
        return 'IEconService';
    }

    public function getMethod()
    {
        return 'CancelTradeOffer';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'POST';
    }

    public function getParams()
    {
        $params = [
            'tradeofferid' => $this->tradeOfferId,
        ];

        return $params;
    }
}
