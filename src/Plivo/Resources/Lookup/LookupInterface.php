<?php

namespace Plivo\Resources\Lookup;

use Plivo\BaseClient;
use Plivo\Resources\ResourceInterface;

/**
 * Class LookupInterface
 * @package Plivo\Resources\Lookup
 */
class LookupInterface extends ResourceInterface
{
    /**
     * LookupInterface constructor.
     * @param BaseClient $plivoClient
     */
    public function __construct(BaseClient $plivoClient)
    {
        parent::__construct($plivoClient);
        $this->uri = "Lookup/Number/";
    }

    /**
     * Lookup a phone number.
     * @param number
     * @param info
     */
    public function get($number, $info = "service_provider")
    {
        $uri = $this->uri . $number . '?info=' . $info;
        $response = $this->client->fetch(
            $uri,
            []
        );

        // returns a nested associative array and is better than subclassing
        // from Resource class since there is no further use for client.
        return $response->getContent();
    }
}
