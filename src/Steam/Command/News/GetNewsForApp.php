<?php

namespace Steam\Command\News;

use Steam\Command\CommandInterface;

class GetNewsForApp implements CommandInterface
{
    /**
     * @var int
     */
    protected $appId;

    /**
     * @var int
     */
    protected $maxLength;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var int
     */
    protected $count = 20;

    /**
     * @var array
     */
    protected $feeds = [];

    /**
     * @param int $appId
     */
    public function __construct($appId)
    {
        $this->appId = (int) $appId;
    }

    /**
     * @param int $count
     * @return self
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param \DateTime $endDate
     * @return self
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @param array $feeds
     * @return self
     */
    public function setFeeds(array $feeds)
    {
        $this->feeds = $feeds;
        return $this;
    }

    /**
     * @param int $maxLength
     * @return self
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    public function getInterface()
    {
        return 'ISteamNews';
    }

    public function getMethod()
    {
        return 'GetNewsForApp';
    }

    public function getVersion()
    {
        return 'v2';
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

        empty($this->maxLength) ?: $params['maxlength'] = $this->maxLength;
        empty($this->endDate) ?: $params['enddate'] = $this->endDate->getTimestamp();
        empty($this->count) ?: $params['count'] = $this->count;
        empty($this->feeds) ?: $params['feeds'] = implode(',', $this->feeds);

        return $params;
    }
}