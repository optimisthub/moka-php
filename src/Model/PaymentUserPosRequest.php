<?php

namespace Moka\Model;

class PaymentUserPosRequest extends Model
{
    /**
     * @var mixed
     */
    protected $dealerAuthentication;

    /**
     * @var mixed
     */
    protected $paymentUserPosRequest;

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
    public function getPaymentUserPosRequest()
    {
        return $this->paymentUserPosRequest;
    }

    /**
     * @param mixed $paymentUserPosRequest  
     */
    public function setPaymentUserPosRequest($paymentUserPosRequest)
    {
        $this->paymentUserPosRequest = $paymentUserPosRequest;
    }

    public function toArray()
    {
        return [
            'DealerAuthentication' => $this->getDealerAuthentication(),
            'PaymentUserPosRequest' => $this->getPaymentUserPosRequest()
        ];
    }
}
