<?php

namespace Moka\Model;

class DealerRequest extends Model
{
    /**
     * @var mixed
     */
    protected $dealerAuthentication;

    /**
     * @var mixed
     */
    protected $dealerRequest;

    /**
     * @return mixed
     */
    public function getDealerAuthentication()
    {
        return $this->dealerAuthentication;
    }

    /**
     * @param mixed $dealerAuthentication  
     */
    public function setDealerAuthentication($dealerAuthentication)
    {
        $this->dealerAuthentication = $dealerAuthentication;
    }

    /**
     * @return mixed
     */
    public function getDealerRequest()
    {
        return $this->dealerRequest;
    }

    /**
     * @param mixed $dealerRequest  
     */
    public function setDealerRequest($dealerRequest)
    {
        $this->dealerRequest = $dealerRequest;
    }

    public function toArray()
    {
        return [
            'DealerAuthentication' => $this->getDealerAuthentication(),
            'DealerRequest' => $this->getDealerRequest()
        ];
    }
}
