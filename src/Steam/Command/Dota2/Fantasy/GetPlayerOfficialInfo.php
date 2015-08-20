<?php

namespace Steam\Command\Dota2\Fantasy;
 
use Steam\Command\CommandInterface;
use Steam\Traits\Dota2CommandTrait;

class GetPlayerOfficialInfo implements CommandInterface
{
    use Dota2CommandTrait;

    /**
     * @var int
     */
    protected $accountId;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
        $this->accountId = (int) $accountId;
    }

    public function getInterface()
    {
        return 'IDOTA2Fantasy_' . $this->getDota2AppId();
    }

    public function getMethod()
    {
        return 'GetPlayerOfficialInfo';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        return [
            'accountid' => $this->accountId,
        ];
    }
}
