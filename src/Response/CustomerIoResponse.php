<?php

declare(strict_types=1);

namespace CIO\Response;


interface CustomerIoResponse
{
    public function getRawBody(): string;

    public function getDecodedBody(): array;
}