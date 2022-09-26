<?php

namespace Moka\Model;

class DealerAccountingRequest extends Model
{
    /**
     * @var mixed
     */
    protected $dealerAuthentication;

    /**
     * @var mixed
     */
    protected $dealerAccountingRequest;

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
    public function getDealerAccountingRequest()
    {
        return $this->dealerAccountingRequest;
    }

    /**
     * @param mixed $dealerAccountingRequest  
     */
    public function setDealerAccountingRequest($dealerAccountingRequest)
    {
        $this->dealerAccountingRequest = $dealerAccountingRequest;
    }

    public function toArray()
    {
        return [
            'DealerAuthentication' => $this->getDealerAuthentication(),
            'DealerAccountingRequest' => $this->getDealerAccountingRequest()
        ];
    }
}
