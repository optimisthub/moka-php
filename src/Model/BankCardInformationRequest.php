<?php

namespace Moka\Model;

class BankCardInformationRequest extends Model
{
    /**
     * @var mixed
     */
    protected $paymentDealerAuthentication;

    /**
     * @var mixed
     */
    protected $bankCardInformationRequest;

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
    public function getBankCardInformationRequest()
    {
        return $this->bankCardInformationRequest;
    }

    /**
     * @param mixed $bankCardInformationRequest  
     */
    public function setBankCardInformationRequest($bankCardInformationRequest)
    {
        $this->bankCardInformationRequest = $bankCardInformationRequest;
    }

    public function toArray()
    {
        return [
            'PaymentDealerAuthentication' => $this->getPaymentDealerAuthentication(),
            'BankCardInformationRequest' => $this->getBankCardInformationRequest()
        ];
    }
}
