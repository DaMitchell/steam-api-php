<?php

namespace Steam\Runner;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\ResponseInterface;
use Steam\Command\CommandInterface;
use Steam\Utility\UrlBuilderInterface;

class GuzzleRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var UrlBuilderInterface
     */
    protected $urlBuilder;

    /**
     * @param ClientInterface $client
     * @param UrlBuilderInterface $urlBuilder
     */
    public function __construct(ClientInterface $client, UrlBuilderInterface $urlBuilder)
    {
        $this->client = $client;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * {@inheritdoc}
     *
     * @return ResponseInterface
     */
    public function run(CommandInterface $command, $result = null)
    {
        $options = [];
        $params = $command->getParams();

        if(!empty($params)) {
            $key = $command->getRequestMethod() === 'GET' ? 'query' : 'body';
            $options[$key] = $params;
        }

        $this->client->setDefaultOption('future', true);

        if($this->getConfig()) {
            $this->urlBuilder->setBaseUrl($this->getConfig()->getBaseSteamApiUrl());
        }

        return $this->client->send($this->client->createRequest(
            $command->getRequestMethod(),
            $this->urlBuilder->build($command),
            $options
        ));
    }
}