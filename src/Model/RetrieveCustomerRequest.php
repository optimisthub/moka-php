<?php

namespace Moka\Model;

class RetrieveCustomerRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerCustomerId;

    /**
     * @var string
     */
    protected $customerCode;

    /**
     * @return integer
     */
    public function getDealerCustomerId()
    {
        return $this->dealerCustomerId;
    }

    /**
     * @param integer $dealerCustomerId  
     */
    public function setDealerCustomerId($dealerCustomerId)
    {
        $this->dealerCustomerId = $dealerCustomerId;
    }

    /**
     * @return string
     */
    public function getCustomerCode()
    {
        return $this->customerCode;
    }

    /**
     * @param string $customerCode  
     */
    public function setCustomerCode($customerCode)
    {
        $this->customerCode = $customerCode;
    }

    public function toArray()
    {
        return [
            'DealerCustomerId' => $this->getDealerCustomerId(),
            'CustomerCode' => $this->getCustomerCode()
        ];
    }
}
