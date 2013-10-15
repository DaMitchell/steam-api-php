<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;

class Economy
{
    public function getAssetClassInfo()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getAssetPrices()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }
}