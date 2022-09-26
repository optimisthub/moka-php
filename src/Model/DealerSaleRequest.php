<?php

namespace Moka\Model;

class DealerSaleRequest extends Model
{
    /**
     * @var mixed
     */
    protected $dealerSaleAuthentication;

    /**
     * @var mixed
     */
    protected $dealerSaleRequest;

    /**
     * @return mixed
     */
    public function getDealerSaleAuthentication()
    {
        return $this->dealerSaleAuthentication;
    }

    /**
     * @param mixed $dealerSaleAuthentication  
     */
    public function setDealerSaleAuthentication($dealerSaleAuthentication)
    {
        $this->dealerSaleAuthentication = $dealerSaleAuthentication;
    }

    /**
     * @return mixed
     */
    public function getDealerSaleRequest()
    {
        return $this->dealerSaleRequest;
    }

    /**
     * @param mixed $dealerSaleRequest  
     */
    public function setDealerSaleRequest($dealerSaleRequest)
    {
        $this->dealerSaleRequest = $dealerSaleRequest;
    }

    public function toArray()
    {
        return [
            'DealerSaleAuthentication' => $this->getDealerSaleAuthentication(),
            'DealerSaleRequest' => $this->getDealerSaleRequest()
        ];
    }
}
