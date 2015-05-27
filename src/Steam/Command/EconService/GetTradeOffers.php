<?php

namespace Steam\Command\EconService;
 
use Steam\Command\CommandInterface;

class GetTradeOffers implements CommandInterface
{
    /**
     * Request the list of sent offers.
     *
     * @var bool
     */
    protected $getSentOffers = false;

    /**
     * Request the list of received offers.
     *
     * @var bool
     */
    protected $getReceivedOffers = false;

    /**
     * If set, the item display data for the items included in the returned trade offers will also be returned.
     *
     * @var bool
     */
    protected $getDescriptions = false;

    /**
     * The language to use when loading item display data.
     *
     * @var string
     */
    protected $language;

    /**
     * Indicates we should only return offers which are still active.
     * Or offers that have changed in state since the time_historical_cutoff.
     *
     * @var bool
     */
    protected $activeOnly = false;

    /**
     * Indicates we should only return offers which are not active.
     *
     * @var bool
     */
    protected $historicalOnly = false;

    /**
     * When active_only is set, offers updated since this time will also be returned
     *
     * @var \Datetime
     */
    protected $timeHistoricalCutoff;

    /**
     * @param bool $getSentOffers
     *
     * @return self
     */
    public function setGetSentOffers($getSentOffers)
    {
        $this->getSentOffers = (bool) $getSentOffers;
        return $this;
    }

    /**
     * @param bool $getReceivedOffers
     *
     * @return self
     */
    public function setGetReceivedOffers($getReceivedOffers)
    {
        $this->getReceivedOffers = (bool) $getReceivedOffers;
        return $this;
    }

    /**
     * @param bool $getDescriptions
     *
     * @return self
     */
    public function setGetDescriptions($getDescriptions)
    {
        $this->getDescriptions = (bool) $getDescriptions;
        return $this;
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
     * @param bool $activeOnly
     *
     * @return self
     */
    public function setActiveOnly($activeOnly)
    {
        $this->activeOnly = (bool) $activeOnly;
        return $this;
    }

    /**
     * @param bool $historicalOnly
     *
     * @return self
     */
    public function setHistoricalOnly($historicalOnly)
    {
        $this->historicalOnly = (bool) $historicalOnly;
        return $this;
    }

    /**
     * @param \DateTime $timeHistoricalCutoff
     *
     * @return self
     */
    public function setTimeHistoricalCutoff(\DateTime $timeHistoricalCutoff)
    {
        $this->timeHistoricalCutoff = $timeHistoricalCutoff;
        return $this;
    }    
    
    public function getInterface()
    {
        return 'IEconService';
    }

    public function getMethod()
    {
        return 'GetTradeOffers';
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
            'get_sent_offers' => $this->getSentOffers,
            'get_received_offers' => $this->getReceivedOffers,
            'get_descriptions' => $this->getDescriptions,
            'active_only' => $this->activeOnly,
            'historical_only' => $this->historicalOnly,
        ];

        empty($this->language) ?: $params['language'] = $this->language;
        empty($this->timeHistoricalCutoff) ?:
            $params['time_historical_cutoff'] = $this->timeHistoricalCutoff->getTimestamp();

        return $params;
    }
}
