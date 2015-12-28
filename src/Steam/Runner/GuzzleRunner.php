<?php

namespace Steam\Runner;
 
use Psr\Http\Message\ResponseInterface;
use Steam\Command\CommandInterface;

class GuzzleRunner extends GuzzleAsyncRunner
{
    /**
     * {@inheritdoc}
     *
     * @return ResponseInterface
     */
    public function run(CommandInterface $command, $result = null)
    {
        return parent::run($command, $result)->wait();
    }
}
