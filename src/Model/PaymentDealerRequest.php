<?php

namespace Moka\Model;

class PaymentDealerRequest extends Model
{
    /**
     * @var mixed
     */
    protected $paymentDealerAuthentication;

    /**
     * @var mixed
     */
    protected $paymentDealerRequest;

    /**
     * @return mixed
     */
    public function getPaymentDealerAuthentication()
    {
        return $this->paymentDealerAuthentication;
    }

    /**
     * @param mixed $paymentDealerAuthentication  
     */
    public function setPaymentDealerAuthentication($paymentDealerAuthentication)
    {
        $this->paymentDealerAuthentication = $paymentDealerAuthentication;
    }

    /**
     * @return mixed
     */
    public function getPaymentDealerRequest()
    {
        return $this->paymentDealerRequest;
    }

    /**
     * @param mixed $paymentDealerRequest  
     */
    public function setPaymentDealerRequest($paymentDealerRequest)
    {
        $this->paymentDealerRequest = $paymentDealerRequest;
    }

    public function toArray()
    {
        return [
            'PaymentDealerAuthentication' => $this->getPaymentDealerAuthentication(),
            'PaymentDealerRequest' => $this->getPaymentDealerRequest()
        ];
    }
}
