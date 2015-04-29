<?php

namespace Steam\Runner;

use Steam\Command\CommandInterface;
use Steam\Configuration;

interface RunnerInterface
{
    /**
     * @param Configuration $config
     *
     * @return self
     */
    public function setConfig(Configuration $config);

    /**
     * @return Configuration
     */
    public function getConfig();

    /**
     * Run the command with the result of the previous runner.
     * Obviously if this is the first runner then the result would be null.
     *
     * @param CommandInterface $command
     * @param null $result
     *
     * @return mixed
     */
    public function run(CommandInterface $command, $result = null);
} 