<?php

namespace Steam\Api;

use Steam\Api\Exception\ApiNotImplementedException;

class RemoteStorage
{
    public function getCollectionDetails()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getPublishedFileDetails()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }

    public function getUGCFileDetails()
    {
        throw new ApiNotImplementedException(sprintf('"%s" has not been implemented', __METHOD__));
    }
}