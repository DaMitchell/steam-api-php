<?php

namespace Steam\Utility;

use GuzzleHttp\Psr7\Uri;
use Steam\Command\CommandInterface;

class GuzzleUrlBuilder implements UrlBuilderInterface
{
    /**
     * @var string
     */
    protected $baseUrl = '';

    /**
     * {@inheritdoc}
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function build(CommandInterface $command)
    {
        $uri = sprintf('%s/%s/%s/%s',
            rtrim($this->getBaseUrl()),
            $command->getInterface(),
            $command->getMethod(),
            $command->getVersion()
        );

        return new Uri($uri);
    }
}