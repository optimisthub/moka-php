<?php

namespace Moka\Model;

class RetrievePaymentPlanListRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerSaleId;

    /**
     * @var string
     */
    protected $saleCode;

    /**
     * @var string
     */
    protected $paymentPlanPaymentDateStart;

    /**
     * @var string
     */
    protected $paymentPlanPaymentDateEnd;

    /**
     * @return integer
     */
    public function getDealerSaleId()
    {
        return $this->dealerSaleId;
    }

    /**
     * @param integer $dealerSaleId  
     */
    public function setDealerSaleId($dealerSaleId)
    {
        $this->dealerSaleId = $dealerSaleId;
    }

    /**
     * @return string
     */
    public function getSaleCode()
    {
        return $this->saleCode;
    }

    /**
     * @param string $saleCode  
     */
    public function setSaleCode($saleCode)
    {
        $this->saleCode = $saleCode;
    }

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
            'DealerSaleId' => $this->getDealerSaleId(),
            'SaleCode' => $this->getSaleCode(),
            'PaymentPlanPaymentDateStart' => $this->getPaymentPlanPaymentDateStart(),
            'PaymentPlanPaymentDateEnd' => $this->getPaymentPlanPaymentDateEnd()
        ];
    }
}
