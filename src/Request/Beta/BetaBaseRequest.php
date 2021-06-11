<?php

declare(strict_types=1);

namespace CIO\Request\Beta;

use CIO\Entity\AccountRegion;
use CIO\Request\CustomerIoRequest;

abstract class BetaBaseRequest implements CustomerIoRequest
{
    /**
     * @throws \CIO\Exception\NotImplementedException
     */
    public function getApiDomain(AccountRegion $region) : string
    {
        switch ($region->getValue()) {
            default:
                return "beta-api.customer.io";
        }
    }
}
