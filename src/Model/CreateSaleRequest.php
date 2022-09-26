<?php

namespace Moka\Model;

class CreateSaleRequest extends Model
{
    /**
     * @var string
     */
    protected $customerCode;

    /**
     * @var integer
     */
    protected $dealerCustomerId;

    /**
     * @var string
     */
    protected $productCode;

    /**
     * @var integer
     */
    protected $dealerProductId;

    /**
     * @var string
     */
    protected $saleCode;

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
     * @var integer
     */
    protected $dealerSaleScheduleId;

    /**
     * @var string
     */
    protected $saleDate;

    /**
     * @var string
     */
    protected $beginDate;

    /**
     * @var string
     */
    protected $endDate;

    /**
     * @var integer
     */
    protected $howManyTrial;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $planType;

    /**
     * @var integer
     */
    protected $dealerCustomerTypeId;

    /**
     * @var string
     */
    protected $defaultCard1Token;

    /**
     * @var string
     */
    protected $defaultCard2Token;

    /**
     * @var string
     */
    protected $defaultCard3Token;

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
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode  
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return integer
     */
    public function getDealerProductId()
    {
        return $this->dealerProductId;
    }

    /**
     * @param integer $dealerProductId  
     */
    public function setDealerProductId($dealerProductId)
    {
        $this->dealerProductId = $dealerProductId;
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

    /**
     * @return integer
     */
    public function getDealerSaleScheduleId()
    {
        return $this->dealerSaleScheduleId;
    }

    /**
     * @param integer $dealerSaleScheduleId  
     */
    public function setDealerSaleScheduleId($dealerSaleScheduleId)
    {
        $this->dealerSaleScheduleId = $dealerSaleScheduleId;
    }

    /**
     * @return string
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * @param string $saleDate  
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
    }

    /**
     * @return string
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @param string $beginDate  
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate  
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return integer
     */
    public function getHowManyTrial()
    {
        return $this->howManyTrial;
    }

    /**
     * @param integer $howManyTrial  
     */
    public function setHowManyTrial($howManyTrial)
    {
        $this->howManyTrial = $howManyTrial;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description  
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return integer
     */
    public function getPlanType()
    {
        return $this->planType;
    }

    /**
     * @param integer $planType  
     */
    public function setPlanType($planType)
    {
        $this->planType = $planType;
    }

    /**
     * @return integer
     */
    public function getDealerCustomerTypeId()
    {
        return $this->dealerCustomerTypeId;
    }

    /**
     * @param integer $dealerCustomerTypeId  
     */
    public function setDealerCustomerTypeId($dealerCustomerTypeId)
    {
        $this->dealerCustomerTypeId = $dealerCustomerTypeId;
    }

    /**
     * @return string
     */
    public function getDefaultCard1Token()
    {
        return $this->defaultCard1Token;
    }

    /**
     * @param string $defaultCard1Token  
     */
    public function setDefaultCard1Token($defaultCard1Token)
    {
        $this->defaultCard1Token = $defaultCard1Token;
    }

    /**
     * @return string
     */
    public function getDefaultCard2Token()
    {
        return $this->defaultCard2Token;
    }

    /**
     * @param string $defaultCard2Token  
     */
    public function setDefaultCard2Token($defaultCard2Token)
    {
        $this->defaultCard2Token = $defaultCard2Token;
    }

    /**
     * @return string
     */
    public function getDefaultCard3Token()
    {
        return $this->defaultCard3Token;
    }

    /**
     * @param string $defaultCard3Token  
     */
    public function setDefaultCard3Token($defaultCard3Token)
    {
        $this->defaultCard3Token = $defaultCard3Token;
    }

    public function toArray()
    {
        return [
            'CustomerCode' => $this->getCustomerCode(),
            'DealerCustomerId' => $this->getDealerCustomerId(),
            'ProductCode' => $this->getProductCode(),
            'DealerProductId' => $this->getDealerProductId(),
            'SaleCode' => $this->getSaleCode(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'InstallmentNumber' => $this->getInstallmentNumber(),
            'DealerSaleScheduleId' => $this->getDealerSaleScheduleId(),
            'SaleDate' => $this->getSaleDate(),
            'BeginDate' => $this->getBeginDate(),
            'EndDate' => $this->getEndDate(),
            'HowManyTrial' => $this->getHowManyTrial(),
            'Description' => $this->getDescription(),
            'PlanType' => $this->getPlanType(),
            'DealerCustomerTypeId' => $this->getDealerCustomerTypeId(),
            'DefaultCard1Token' => $this->getDefaultCard1Token(),
            'DefaultCard2Token' => $this->getDefaultCard2Token(),
            'DefaultCard3Token' => $this->getDefaultCard3Token()
        ];
    }
}
