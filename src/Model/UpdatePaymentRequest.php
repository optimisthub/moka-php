<?php

namespace Moka\Model;

class UpdatePaymentRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerPaymentId;

    /**
     * @var string
     */
    protected $otherTrxCode;

    /**
     * @var string
     */
    protected $virtualPosOrderId;

    /**
     * @var string
     */
    protected $software;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Buyer
     */
    protected $buyerInformation;

    /**
     * @return integer
     */
    public function getDealerPaymentId()
    {
        return $this->dealerPaymentId;
    }

    /**
     * @param integer $dealerPaymentId  
     */
    public function setDealerPaymentId($dealerPaymentId)
    {
        $this->dealerPaymentId = $dealerPaymentId;
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

    /**
     * @return string
     */
    public function getVirtualPosOrderId()
    {
        return $this->virtualPosOrderId;
    }

    /**
     * @param string $virtualPosOrderId  
     */
    public function setVirtualPosOrderId($virtualPosOrderId)
    {
        $this->virtualPosOrderId = $virtualPosOrderId;
    }

    /**
     * @return string
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * @param string $software  
     */
    public function setSoftware($software)
    {
        $this->software = $software;
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
     * @return Buyer
     */
    public function getBuyerInformation()
    {
        return $this->buyerInformation;
    }

    /**
     * @param Buyer $buyerInformation  
     */
    public function setBuyerInformation(Buyer $buyerInformation)
    {
        $this->buyerInformation = $buyerInformation;
    }

    public function toArray()
    {
        return [
            'DealerPaymentId' => $this->getDealerPaymentId(),
            'OtherTrxCode' => $this->getOtherTrxCode(),
            'VirtualPosOrderId' => $this->getVirtualPosOrderId(),
            'Software' => $this->getSoftware(),
            'Description' => $this->getDescription(),
            'BuyerInformation' => $this->getBuyerInformation()
        ];
    }
}
