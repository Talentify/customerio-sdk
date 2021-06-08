<?php

declare(strict_types=1);

namespace CIO\Request\Track;

use CIO\Entity\AccountRegion;
use CIO\Exception\NotImplemented;
use CIO\Request\CustomerIoRequest;

abstract class TrackBaseRequest implements CustomerIoRequest
{
    /**
     * @throws \CIO\Exception\NotImplemented
     */
    public function getApiDomain(AccountRegion $region) : string
    {
        switch ($region->getValue()) {
            case AccountRegion::US:
                return "track.customer.io";
            case AccountRegion::EU:
                return "track-eu.customer.io";
            default:
                throw new NotImplemented();
        }
    }
}
