<?php

namespace Moka\HttpClient;

class Request
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $path;

    /**
     *
     * @var array
     */
    protected $query;

    /**
     * @var string
     */
    protected $method;

    /**
     *
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $url
     * @param string $method
     */
    public function __construct($url, $method)
    {
        $this->url = $url;
        $this->method = strtoupper($method);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the request method.
     * 
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Sets raw body data
     * 
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
