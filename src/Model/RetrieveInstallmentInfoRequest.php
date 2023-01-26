<?php

namespace Moka\Model;

class RetrieveInstallmentInfoRequest extends Model
{
    /**
     * @var string
     */
    protected $binNumber;

    /**
     * @var float
     */
    protected $currency;

    /**
     * @var float
     */
    protected $orderAmount;

    /**
     * @var integer
     */
    protected $isThreeD;

    /**
     * @var integer
     */
    protected $IsIncludedCommissionAmount;

    /**
     * @return string
     */
    public function getBinNumber()
    {
        return $this->binNumber;
    }

    /**
     * @param string $binNumber  
     */
    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    /**
     * @return float
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param float $currency  
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * @param float $orderAmount  
     */
    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * @return integer
     */
    public function getIsThreeD()
    {
        return $this->isThreeD;
    }

    /**
     * @param integer $isThreeD  
     */
    public function setIsThreeD($isThreeD)
    {
        $this->isThreeD = $isThreeD;
    }

    /**
     * @return integer
     */
    public function getIsIncludedCommissionAmount()
    {
        return $this->IsIncludedCommissionAmount;
    }

    /**
     * @param integer $IsIncludedCommissionAmount  
     */
    public function setIsIncludedCommissionAmount($IsIncludedCommissionAmount)
    {
        $this->IsIncludedCommissionAmount = $IsIncludedCommissionAmount;
    }

    public function toArray()
    {
        return [
            'BinNumber' => $this->getBinNumber(),
            'Currency' => $this->getCurrency(),
            'OrderAmount' => $this->getOrderAmount(),
            'IsThreeD' => $this->getIsThreeD(),
            'IsIncludedCommissionAmount' => $this->getIsIncludedCommissionAmount(),
        ];
    }
}
