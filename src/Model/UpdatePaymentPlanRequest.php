<?php

namespace Moka\Model;

class UpdatePaymentPlanRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerPaymentPlanId;

    /**
     * @var string
     */
    protected $paymentDate;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var integer
     */
    protected $installmentNumber;

    /**
     * @return integer
     */
    public function getDealerPaymentPlanId()
    {
        return $this->dealerPaymentPlanId;
    }

    /**
     * @param integer $dealerPaymentPlanId  
     */
    public function setDealerPaymentPlanId($dealerPaymentPlanId)
    {
        $this->dealerPaymentPlanId = $dealerPaymentPlanId;
    }

    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param string $paymentDate  
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount  
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency  
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return integer
     */
    public function getInstallmentNumber()
    {
        return $this->installmentNumber;
    }

    /**
     * @param integer $installmentNumber  
     */
    public function setInstallmentNumber($installmentNumber)
    {
        $this->installmentNumber = $installmentNumber;
    }

    public function toArray()
    {
        return [
            'DealerPaymentPlanId' => $this->getDealerPaymentPlanId(),
            'PaymentDate' => $this->getPaymentDate(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'InstallmentNumber' => $this->getInstallmentNumber()
        ];
    }
}
