<?php

namespace Moka\Model;

class ReportingPaymentPlanRequest extends Model
{
    /**
     * @var string
     */
    protected $paymentPlanPaymentDateStart;

    /**
     * @var string
     */
    protected $paymentPlanPaymentDateEnd;

    /**
     * @return string
     */
    public function getPaymentPlanPaymentDateStart()
    {
        return $this->paymentPlanPaymentDateStart;
    }

    /**
     * @param string $paymentPlanPaymentDateStart  
     */
    public function setPaymentPlanPaymentDateStart($paymentPlanPaymentDateStart)
    {
        $this->paymentPlanPaymentDateStart = $paymentPlanPaymentDateStart;
    }

    /**
     * @return string
     */
    public function getPaymentPlanPaymentDateEnd()
    {
        return $this->paymentPlanPaymentDateEnd;
    }

    /**
     * @param string $paymentPlanPaymentDateEnd  
     */
    public function setPaymentPlanPaymentDateEnd($paymentPlanPaymentDateEnd)
    {
        $this->paymentPlanPaymentDateEnd = $paymentPlanPaymentDateEnd;
    }

    public function toArray()
    {
        return [
            'PaymentPlanPaymentDateStart' => $this->getPaymentPlanPaymentDateStart(),
            'PaymentPlanPaymentDateEnd' => $this->getPaymentPlanPaymentDateEnd()
        ];
    }
}
