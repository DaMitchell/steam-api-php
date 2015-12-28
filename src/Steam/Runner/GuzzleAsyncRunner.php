<?php

namespace Steam\Runner;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use Steam\Command\CommandInterface;
use Steam\Utility\UrlBuilderInterface;

class GuzzleAsyncRunner extends AbstractRunner implements RunnerInterface
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
     * @return PromiseInterface
     */
    public function run(CommandInterface $command, $result = null)
    {
        $key = $command->getRequestMethod() === 'GET' ? 'query' : 'body';
        $options = [$key => []];

        if(!empty($params = $command->getParams())) {
            $options[$key] = array_merge($options[$key], $params);
        }

        if($config = $this->getConfig()) {
            if(!empty($config->getSteamKey())) {
                $options[$key]['key'] = $config->getSteamKey();
            }

            $this->urlBuilder->setBaseUrl($config->getBaseSteamApiUrl());
        }

        $request = new Request(
            $command->getRequestMethod(),
            $this->urlBuilder->build($command)
        );

        return $this->client->sendAsync($request, $options);
    }
}