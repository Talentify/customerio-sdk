<?php

declare(strict_types=1);

namespace CIO\Response;

interface CustomerIoResponse
{
    public function getStatusCode() : int;

    public function getRawBody() : string;

    /**
     * @return mixed[]
     */
    public function getDecodedBody() : array;
}
