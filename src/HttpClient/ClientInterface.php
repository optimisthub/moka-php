<?php

namespace Moka\HttpClient;

interface ClientInterface
{
    /**
     * @param Request $request
     */
    public function request(Request $request);
}
