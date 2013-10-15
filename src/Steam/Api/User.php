<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;

class User
{
    public function getFriendList()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getPlayerBans()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getPlayerSummaries()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getUserGroupList()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function resolveVanityUrl()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }
}