<?php

namespace Steam\Utility;

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
        $pattern = rtrim($this->getBaseUrl(), '/') . '/{interface}/{method}/{version}';

        return [$pattern, [
            'interface' => $command->getInterface(),
            'method' => $command->getMethod(),
            'version' => $command->getVersion(),
        ]];
    }
}