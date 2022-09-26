<?php

namespace Moka;

class ApiResponse
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var string
     */
    protected $resultCode;

    /**
     * @var string
     */
    protected $resultMessage;

    /**
     * @var mixed
     */
    protected $exception;

    public function __construct($content = '')
    {
        $this->content = $content;
        $this->handleResponse();
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getResultCode()
    {
        return $this->resultCode;
    }

    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    public function getException()
    {
        return $this->exception;
    }

    private function handleResponse()
    {
        $jsonObject = json_decode($this->content);

        if (isset($jsonObject->Data)) {
            $this->data = $jsonObject->Data;
        }
        if (isset($jsonObject->ResultCode)) {
            $this->resultCode = $jsonObject->ResultCode;
        }
        if (isset($jsonObject->ResultMessage)) {
            $this->resultMessage = $jsonObject->ResultMessage;
        }
        if (isset($jsonObject->Exception)) {
            $this->exception = $jsonObject->Exception;
        }
    }
}
