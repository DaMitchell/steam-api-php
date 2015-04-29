<?php

namespace Steam\Runner;

use GuzzleHttp\Message\ResponseInterface;
use Steam\Command\CommandInterface;
use Steam\Exception\InvalidResultException;

class GuzzleJsonRunner extends AbstractRunner implements RunnerInterface
{
    /**
     * {@inheritdoc}
     *
     * @param ResponseInterface $result
     */
    public function run(CommandInterface $command, $result = null)
    {
        if(!$result instanceof ResponseInterface) {
            throw new \InvalidArgumentException(
                'The result needs to be an instance of GuzzleHttp\Message\ResponseInterface');
        }

        return $result->json();
    }
}