<?php

namespace Moka\Model;

class RetrievePaymentListRequest extends Model
{
    /**
     * @var string
     */
    protected $paymentStartDate;

    /**
     * @var string
     */
    protected $paymentEndDate;

    /**
     * @var integer
     */
    protected $paymentStatus;

    /**
     * @var integer
     */
    protected $trxStatus;

    /**
     * @return string
     */
    public function getPaymentStartDate()
    {
        return $this->paymentStartDate;
    }

    /**
     * @param string $paymentStartDate  
     */
    public function setPaymentStartDate($paymentStartDate)
    {
        $this->paymentStartDate = $paymentStartDate;
    }

    /**
     * @return string
     */
    public function getPaymentEndDate()
    {
        return $this->paymentEndDate;
    }

    /**
     * @param string $paymentEndDate  
     */
    public function setPaymentEndDate($paymentEndDate)
    {
        $this->paymentEndDate = $paymentEndDate;
    }

    /**
     * @return integer
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @param integer $paymentStatus  
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return integer
     */
    public function getTrxStatus()
    {
        return $this->trxStatus;
    }

    /**
     * @param integer $trxStatus  
     */
    public function setTrxStatus($trxStatus)
    {
        $this->trxStatus = $trxStatus;
    }

    public function toArray()
    {
        return [
            'PaymentStartDate' => $this->getPaymentStartDate(),
            'PaymentEndDate' => $this->getPaymentEndDate(),
            'PaymentStatus' => $this->getPaymentStatus(),
            'TrxStatus' => $this->getTrxStatus()
        ];
    }
}
