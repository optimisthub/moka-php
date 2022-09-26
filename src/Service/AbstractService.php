<?php

namespace Moka\Service;

abstract class AbstractService
{
    /**
     * @var \Moka\MokaClient
     */
    protected $client;

    /**
     * @param \Moka\MokaClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @return \Moka\MokaClient
     */
    public function getClient()
    {
        return $this->client;
    }

    protected function request($method, $path, $params = [], $headers = [])
    {
        return $this->client->request($method, $path, $params, $headers);
    }
}
