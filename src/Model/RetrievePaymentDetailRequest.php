<?php

namespace Moka\Model;

class RetrievePaymentDetailRequest extends Model
{
    /**
     * @var string
     */
    protected $paymentId;

    /**
     * @var string
     */
    protected $otherTrxCode;

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param string $paymentId  
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return string
     */
    public function getOtherTrxCode()
    {
        return $this->otherTrxCode;
    }

    /**
     * @param string $otherTrxCode  
     */
    public function setOtherTrxCode($otherTrxCode)
    {
        $this->otherTrxCode = $otherTrxCode;
    }

    public function toArray()
    {
        return [
            'PaymentId' => $this->getPaymentId(),
            'OtherTrxCode' => $this->getOtherTrxCode()
        ];
    }
}
