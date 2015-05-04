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
        $key = $command->getRequestMethod() === 'GET' ? 'query' : 'body';
        $options = [$key => []];

        if(!empty($params = $command->getParams())) {
            $options[$key] = array_merge($options[$key], $params);
        }

        // TODO: Possibly make this configurable. Setting this to true just adds a couple extra methods.
        $this->client->setDefaultOption('future', true);

        if($config = $this->getConfig()) {
            if(!empty($config->getSteamKey())) {
                $options[$key]['key'] = $config->getSteamKey();
            }

            $this->urlBuilder->setBaseUrl($config->getBaseSteamApiUrl());
        }

        return $this->client->send($this->client->createRequest(
            $command->getRequestMethod(),
            $this->urlBuilder->build($command),
            $options
        ));
    }
}