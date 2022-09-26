<?php

namespace Moka;

use Moka\HttpClient\HttpClient;
use Moka\HttpClient\Request;

class BaseMokaClient
{
    /** 
     * @var string default base URL for Moka's API 
     */
    const DEFAULT_API_BASE = 'https://service.moka.com';

    /**
     * @var string
     */
    private $baseUrl = self::DEFAULT_API_BASE;

    /**
     * @var string
     */
    private $dealerCode;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @param array $options
     * @return void
     */
    public function __construct($options = [])
    {
        if (isset($options['dealerCode'])) {
            $this->dealerCode = $options['dealerCode'];
        }
        if (isset($options['username'])) {
            $this->username = $options['username'];
        }
        if (isset($options['password'])) {
            $this->password = $options['password'];
        }
        if (isset($options['baseUrl'])) {
            $this->baseUrl = $options['baseUrl'];
        }
    }

    /**
     * Returns the base Url of the API endpoint.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $method The HTTP method being used
     * @param string $path
     * @param array|object $params Key-value pairs for parameters. | JsonSerializable
     * @param array $headers Headers to be used in the request
     * @return ApiResponse
     */
    public function request($method, $path, $params, $headers)
    {
        $request = new Request($this->prepareRequestUrl($path), $method);
        $request->setHeaders($this->prepareRequestHeaders($headers));
        $request->setContent(json_encode($params));

        $response = HttpClient::getClient()->request($request);

        return new ApiResponse($response);
    }

    /**
     * @return array
     */
    public function getAuthorizationParams()
    {
        $authorizationParams = [
            'DealerCode' => $this->dealerCode,
            'Username' => $this->username,
            'Password' => $this->password,
            'CheckKey' => $this->generateHash()
        ];

        return $authorizationParams;
    }

    /**
     * @return string
     */
    private function generateHash()
    {
        $data = $this->dealerCode . 'MK' . $this->username . 'PD' . $this->password;

        return hash('sha256', $data);
    }

    /**
     * @param string $path
     * @return string
     */
    private function prepareRequestUrl($path)
    {
        return $this->getBaseUrl() . $path;
    }

    /**
     * @param array $headers
     * @return array
     */
    private function prepareRequestHeaders($headers)
    {
        $defaultHeaders = [
            'Accept: application/json',
            'Content-type: application/json',
        ];

        $headers = array_merge($defaultHeaders, $headers);

        return $headers;
    }
}
