<?php

namespace Moka\HttpClient;

class HttpClient
{
    /**
     * Returns an HTTP Client.
     *
     * @return ClientInterface
     */
    public static function getClient()
    {
        return new CurlClient();
    }
}
