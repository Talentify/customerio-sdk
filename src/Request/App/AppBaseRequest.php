<?php

declare(strict_types=1);

namespace CIO\Request\App;

use CIO\Entity\AccountRegion;
use CIO\Entity\AuthType;
use CIO\Exception\NotImplemented;
use CIO\Request\CustomerIoRequest;

abstract class AppBaseRequest implements CustomerIoRequest
{
    /**
     * @throws \CIO\Exception\NotImplemented
     */
    public function getApiDomain(AccountRegion $region) : string
    {
        switch ($region->getValue()) {
            case AccountRegion::US:
                return "api.customer.io";
            case AccountRegion::EU:
                return "api-eu.customer.io";
            default:
                throw new NotImplemented();
        }
    }

    public function getAuthType() : AuthType
    {
        return AuthType::BEARER();
    }
}
