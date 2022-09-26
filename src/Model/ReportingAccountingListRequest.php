<?php

namespace Moka\Model;

class ReportingAccountingListRequest extends Model
{
    /**
     * @var string
     */
    protected $transferStartDate;

    /**
     * @var string
     */
    protected $transferEndDate;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var integer
     */
    protected $subDealerId;

    /**
     * @return string
     */
    public function getTransferStartDate()
    {
        return $this->transferStartDate;
    }

    /**
     * @param string $transferStartDate  
     */
    public function setTransferStartDate($transferStartDate)
    {
        $this->transferStartDate = $transferStartDate;
    }

    /**
     * @return string
     */
    public function getTransferEndDate()
    {
        return $this->transferEndDate;
    }

    /**
     * @param string $transferEndDate  
     */
    public function setTransferEndDate($transferEndDate)
    {
        $this->transferEndDate = $transferEndDate;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode  
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return integer
     */
    public function getSubDealerId()
    {
        return $this->subDealerId;
    }

    /**
     * @param integer $subDealerId  
     */
    public function setSubDealerId($subDealerId)
    {
        $this->subDealerId = $subDealerId;
    }

    public function toArray()
    {
        return [
            'TransferStartDate' => $this->getTransferStartDate(),
            'TransferEndDate' => $this->getTransferEndDate(),
            'CurrencyCode' => $this->getCurrencyCode(),
            'SubDealerId' => $this->getSubDealerId()
        ];
    }
}
