<?php

namespace Moka\Model;

class RetrieveTransactionListRequest extends Model
{
    /**
     * @var string
     */
    protected $trxStartDate;

    /**
     * @var string
     */
    protected $trxEndDate;

    /**
     * @var integer
     */
    protected $trxType;

    /**
     * @var integer
     */
    protected $trxStatus;

    /**
     * @return string
     */
    public function getTrxStartDate()
    {
        return $this->trxStartDate;
    }

    /**
     * @param string $trxStartDate  
     */
    public function setTrxStartDate($trxStartDate)
    {
        $this->trxStartDate = $trxStartDate;
    }

    /**
     * @return string
     */
    public function getTrxEndDate()
    {
        return $this->trxEndDate;
    }

    /**
     * @param string $trxEndDate  
     */
    public function setTrxEndDate($trxEndDate)
    {
        $this->trxEndDate = $trxEndDate;
    }

    /**
     * @return integer
     */
    public function getTrxType()
    {
        return $this->trxType;
    }

    /**
     * @param integer $trxType  
     */
    public function setTrxType($trxType)
    {
        $this->trxType = $trxType;
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
            'TrxStartDate' => $this->getTrxStartDate(),
            'TrxEndDate' => $this->getTrxEndDate(),
            'TrxType' => $this->getTrxType(),
            'TrxStatus' => $this->getTrxStatus()
        ];
    }
}
