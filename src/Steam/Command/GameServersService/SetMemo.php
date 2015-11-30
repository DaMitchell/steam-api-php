<?php

namespace Steam\Command\GameServersService;
 
use Steam\Command\CommandInterface;

class SetMemo implements CommandInterface
{
    /**
     * @var int
     */
    protected $steamId;

    /**
     * @var string
     */
    protected $memo;

    /**
     * @param int $steamId
     * @param string $memo
     */
    public function __construct($steamId, $memo)
    {
        $this->steamId = (int) $steamId;
        $this->memo = $memo;
    }

    public function getInterface()
    {
        return 'IGameServersService';
    }

    public function getMethod()
    {
        return 'SetMemo';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'POST';
    }

    public function getParams()
    {
        return [
            'steamid' => $this->steamId,
            'memo' => $this->memo,
        ];
    }
}
