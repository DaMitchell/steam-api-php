<?php

namespace Steam;

use Steam\Command\CommandInterface;
use Steam\Runner\RunnerInterface;

class Steam
{
    /**
     * @var array
     */
    protected $runners = [];

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param Configuration $config
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Configuration $config
     *
     * @return self
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @param array $runners
     *
     * @return self
     */
    public function addRunners(array $runners)
    {
        foreach($runners as $runner) {
            $this->addRunner($runner);
        }

        return $this;
    }

    /**
     * @param RunnerInterface $runner
     *
     * @return self
     */
    public function addRunner(RunnerInterface $runner)
    {
        $this->runners[] = $runner->setConfig($this->config);
        return $this;
    }

    /**
     * @param CommandInterface $command
     *
     * @return mixed
     */
    public function run(CommandInterface $command)
    {
        $result = null;

        /** @var RunnerInterface $runner */
        foreach($this->runners as $runner) {
            $result = $runner->run($command, $result);
        }

        return $result;
    }
}