<?php

declare(strict_types=1);

namespace CIO\Response;

class BaseResponse implements CustomerIoResponse
{

    /**
     * @var string
     */
    private $rawBody;

    public function __construct(string $rawBody)
    {
        $this->rawBody = $rawBody;
    }

    public function getRawBody() : string
    {
        return $this->rawBody;
    }

    public function getDecodedBody() : array
    {
        return json_decode($this->getRawBody(), true);
    }
}
