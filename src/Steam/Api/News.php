<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;

class News
{
    public function getNewsForApp()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }
}