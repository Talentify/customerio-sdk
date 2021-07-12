<?php

declare(strict_types=1);

namespace CIO\Response;

class BaseResponse implements CustomerIoResponse
{

    /**
     * @var string
     */
    private $rawBody;
    /**
     * @var int
     */
    private $statusCode;

    public function __construct(int $statusCode, string $rawBody)
    {
        $this->rawBody    = $rawBody;
        $this->statusCode = $statusCode;
    }

    public function getRawBody() : string
    {
        return $this->rawBody;
    }

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function getDecodedBody() : array
    {
        $body = json_decode($this->getRawBody(), true);
        return $body ?? [];
    }
}
