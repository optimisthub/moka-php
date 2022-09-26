<?php

namespace Moka\Model;

class CreateCardRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerCustomerId;

    /**
     * @var string
     */
    protected $customerCode;

    /**
     * @var string
     */
    protected $cardHolderFullName;

    /**
     * @var string
     */
    protected $cardNumber;

    /**
     * @var string
     */
    protected $expMonth;

    /**
     * @var string
     */
    protected $expYear;

    /**
     * @var string
     */
    protected $cardName;

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
     * @return string
     */
    public function getCardHolderFullName()
    {
        return $this->cardHolderFullName;
    }

    /**
     * @param string $cardHolderFullName  
     */
    public function setCardHolderFullName($cardHolderFullName)
    {
        $this->cardHolderFullName = $cardHolderFullName;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber  
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return string
     */
    public function getExpMonth()
    {
        return $this->expMonth;
    }

    /**
     * @param string $expMonth  
     */
    public function setExpMonth($expMonth)
    {
        $this->expMonth = $expMonth;
    }

    /**
     * @return string
     */
    public function getExpYear()
    {
        return $this->expYear;
    }

    /**
     * @param string $expYear  
     */
    public function setExpYear($expYear)
    {
        $this->expYear = $expYear;
    }

    /**
     * @return string
     */
    public function getCardName()
    {
        return $this->cardName;
    }

    /**
     * @param string $cardName  
     */
    public function setCardName($cardName)
    {
        $this->cardName = $cardName;
    }

    public function toArray()
    {
        return [
            'DealerCustomerId' => $this->getDealerCustomerId(),
            'CustomerCode' => $this->getCustomerCode(),
            'CardHolderFullName' => $this->getCardHolderFullName(),
            'CardNumber' => $this->getCardNumber(),
            'ExpMonth' => $this->getExpMonth(),
            'ExpYear' => $this->getExpYear(),
            'CardName' => $this->getCardName()
        ];
    }
}
