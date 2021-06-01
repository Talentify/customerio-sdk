<?php

namespace CIO;

interface CustomerIoRequest
{
    public function getPath() : string;

    public function getMethod() : RequestType;

    public function getBody() : array;
}
