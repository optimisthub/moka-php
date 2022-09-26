<?php

namespace Moka\Model;

class RetrievePaymentAmountRequest extends Model
{
    /**
     * @var string
     */
    protected $binNumber;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var float
     */
    protected $orderAmount;

    /**
     * @var float
     */
    protected $installmentNumber;

    /**
     * @var float
     */
    protected $groupRevenueRate;

    /**
     * @var float
     */
    protected $groupRevenueAmount;

    /**
     * @var integer
     */
    protected $isThreeD;

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
     * @return float
     */
    public function getInstallmentNumber()
    {
        return $this->installmentNumber;
    }

    /**
     * @param float $installmentNumber  
     */
    public function setInstallmentNumber($installmentNumber)
    {
        $this->installmentNumber = $installmentNumber;
    }

    /**
     * @return float
     */
    public function getGroupRevenueRate()
    {
        return $this->groupRevenueRate;
    }

    /**
     * @param float $groupRevenueRate  
     */
    public function setGroupRevenueRate($groupRevenueRate)
    {
        $this->groupRevenueRate = $groupRevenueRate;
    }

    /**
     * @return float
     */
    public function getGroupRevenueAmount()
    {
        return $this->groupRevenueAmount;
    }

    /**
     * @param float $groupRevenueAmount  
     */
    public function setGroupRevenueAmount($groupRevenueAmount)
    {
        $this->groupRevenueAmount = $groupRevenueAmount;
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

    public function toArray()
    {
        return [
            'BinNumber' => $this->getBinNumber(),
            'Currency' => $this->getCurrency(),
            'OrderAmount' => $this->getOrderAmount(),
            'InstallmentNumber' => $this->getInstallmentNumber(),
            'GroupRevenueRate' => $this->getGroupRevenueRate(),
            'GroupRevenueAmount' => $this->getGroupRevenueAmount(),
            'IsThreeD' => $this->getIsThreeD()
        ];
    }
}
