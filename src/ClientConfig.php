<?php

declare(strict_types=1);

namespace CIO;

class ClientConfig
{
    const PROTOCOL = 'https';
    /**
     * @var \CIO\AccountRegion
     */
    private $region;
    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $basePath;

    /**
     * DefaultClientConfig constructor.
     * @param string $version
     * @param string $basePath
     */
    public function __construct(
        AccountRegion $region,
        string $version = 'v1',
        string $basePath = '/api/'
    ) {
        $this->region   = $region;
        $this->version  = $version;
        $this->basePath = $basePath;
    }

    public function getApiBasePath() : string
    {
        return $this->basePath . $this->version . '/';
    }

    public function getApiUri() : string
    {
        return self::PROTOCOL . '://' . $this->region->getValue();
    }
}
