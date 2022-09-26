<?php

namespace Moka\Model;

class DealerCustomerRequest extends Model
{
    /**
     * @var mixed
     */
    protected $dealerCustomerAuthentication;

    /**
     * @var mixed
     */
    protected $dealerCustomerRequest;

    /**
     * @return mixed
     */
    public function getDealerCustomerAuthentication()
    {
        return $this->dealerCustomerAuthentication;
    }

    /**
     * @param mixed $dealerCustomerAuthentication  
     */
    public function setDealerCustomerAuthentication($dealerCustomerAuthentication)
    {
        $this->dealerCustomerAuthentication = $dealerCustomerAuthentication;
    }

    /**
     * @return mixed
     */
    public function getDealerCustomerRequest()
    {
        return $this->dealerCustomerRequest;
    }

    /**
     * @param mixed $dealerCustomerRequest  
     */
    public function setDealerCustomerRequest($dealerCustomerRequest)
    {
        $this->dealerCustomerRequest = $dealerCustomerRequest;
    }

    public function toArray()
    {
        return [
            'DealerCustomerAuthentication' => $this->getDealerCustomerAuthentication(),
            'DealerCustomerRequest' => $this->getDealerCustomerRequest()
        ];
    }
}
