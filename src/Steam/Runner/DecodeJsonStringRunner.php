<?php

namespace Steam\Runner;

use Psr\Http\Message\ResponseInterface;
use Steam\Command\CommandInterface;

class DecodeJsonStringRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * {@inheritdoc}
     *
     * @param \Psr\Http\Message\ResponseInterface $result
     */
    public function run(CommandInterface $command, $result = null)
    {
        if(!$result instanceof ResponseInterface) {
            throw new \InvalidArgumentException(
                'The result needs to be an instance of GuzzleHttp\Message\ResponseInterface');
        }

        return json_decode($result->getBody()->getContents(), true);
    }
}