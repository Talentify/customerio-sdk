<?php

declare(strict_types=1);

namespace CIO;

use CIO\Api\Track;
use CIO\Entity\AccountRegion;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class CustomerIoClient
{
    /**
     * @var string
     */
    private $siteId;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var AccountRegion
     */
    private $region;
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;
    /**
     * @var Track
     */
    private $track;

    public function __construct(
        string $siteId,
        string $apiKey,
        ?AccountRegion $accountRegion = null,
        ?ClientInterface $client = null
    ) {
        $this->siteId = $siteId;
        $this->apiKey = $apiKey;
        $this->region = $accountRegion ?? AccountRegion::US();
        $this->client = $client ?? new Client();
        $this->track  = new Track($this->region, [$this->siteId, $this->apiKey], $this->client);
    }

    public function track() : Track
    {
        //Talvez instanciar sempre que for chamado?
        return $this->track;
    }
}
