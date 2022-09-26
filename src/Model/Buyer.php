<?php

namespace Moka\Model;

class Buyer extends Model
{
    /**
     * @var string
     */
    protected $buyerFullName;

    /**
     * @var string
     */
    protected $buyerEmail;

    /**
     * @var string
     */
    protected $buyerGsmNumber;

    /**
     * @var string
     */
    protected $buyerAddress;

    /**
     * @return string
     */
    public function getBuyerFullName()
    {
        return $this->buyerFullName;
    }

    /**
     * @param string $buyerFullName  
     */
    public function setBuyerFullName($buyerFullName)
    {
        $this->buyerFullName = $buyerFullName;
    }

    /**
     * @return string
     */
    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    /**
     * @param string $buyerEmail  
     */
    public function setBuyerEmail($buyerEmail)
    {
        $this->buyerEmail = $buyerEmail;
    }

    /**
     * @return string
     */
    public function getBuyerGsmNumber()
    {
        return $this->buyerGsmNumber;
    }

    /**
     * @param string $buyerGsmNumber  
     */
    public function setBuyerGsmNumber($buyerGsmNumber)
    {
        $this->buyerGsmNumber = $buyerGsmNumber;
    }

    /**
     * @return string
     */
    public function getBuyerAddress()
    {
        return $this->buyerAddress;
    }

    /**
     * @param string $buyerAddress  
     */
    public function setBuyerAddress($buyerAddress)
    {
        $this->buyerAddress = $buyerAddress;
    }

    public function toArray()
    {
        return [
            'BuyerFullName' => $this->getBuyerFullName(),
            'BuyerEmail' => $this->getBuyerEmail(),
            'BuyerGsmNumber' => $this->getBuyerGsmNumber(),
            'BuyerAddress' => $this->getBuyerAddress()
        ];
    }
}
