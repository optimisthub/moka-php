<?php

namespace Moka\Model;

class CreatePaymentRequest extends Model
{
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
    protected $cvcNumber;

    /**
     * @var string
     */
    protected $cardToken;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var int
     */
    protected $installmentNumber;

    /**
     * @var string
     */
    protected $clientIp;

    /**
     * @var string
     */
    protected $otherTrxCode;

    /**
     * @var string
     */
    protected $subMerchantName;

    /**
     * @var int
     */
    protected $isPoolPayment;

    /**
     * @var int
     */
    protected $isTokenized;

    /**
     * @var int
     */
    protected $integratorId;

    /**
     * @var string
     */
    protected $software;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $isPreAuth;

    /**
     * @var Buyer
     */
    protected $buyerInformation;

    /**
     * @var BasketProduct
     */
    protected $basketProduct;

    /**
     * @var Customer
     */
    protected $customerInformation;

    /**
     * @var integer
     */
    protected $returnHash;

    /**
     * @var string
     */
    protected $redirectUrl;

    /**
     * @var integer
     */
    protected $redirectType;

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
    public function getCvcNumber()
    {
        return $this->cvcNumber;
    }

    /**
     * @param string $cvcNumber  
     */
    public function setCvcNumber($cvcNumber)
    {
        $this->cvcNumber = $cvcNumber;
    }

    /**
     * @return string
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param string $cardToken  
     */
    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
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
     * @return int
     */
    public function getInstallmentNumber()
    {
        return $this->installmentNumber;
    }

    /**
     * @param int $installmentNumber  
     */
    public function setInstallmentNumber($installmentNumber)
    {
        $this->installmentNumber = $installmentNumber;
    }

    /**
     * @return string
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * @param string $clientIp  
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
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
    public function getSubMerchantName()
    {
        return $this->subMerchantName;
    }

    /**
     * @param string $subMerchantName  
     */
    public function setSubMerchantName($subMerchantName)
    {
        $this->subMerchantName = $subMerchantName;
    }

    /**
     * @return int
     */
    public function getIsPoolPayment()
    {
        return $this->isPoolPayment;
    }

    /**
     * @param int $isPoolPayment  
     */
    public function setIsPoolPayment($isPoolPayment)
    {
        $this->isPoolPayment = $isPoolPayment;
    }

    /**
     * @return int
     */
    public function getIsTokenized()
    {
        return $this->isTokenized;
    }

    /**
     * @param int $isTokenized  
     */
    public function setIsTokenized($isTokenized)
    {
        $this->isTokenized = $isTokenized;
    }

    /**
     * @return int
     */
    public function getIntegratorId()
    {
        return $this->integratorId;
    }

    /**
     * @param int $integratorId  
     */
    public function setIntegratorId($integratorId)
    {
        $this->integratorId = $integratorId;
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
     * @return int
     */
    public function getIsPreAuth()
    {
        return $this->isPreAuth;
    }

    /**
     * @param int $isPreAuth  
     */
    public function setIsPreAuth($isPreAuth)
    {
        $this->isPreAuth = $isPreAuth;
    }

    /**
     * @return Buyer
     */
    public function getBuyerInformation()
    {
        return $this->buyerInformation;
    }

    /**
     * @param Buyer $buyerInformation; 
     */
    public function setBuyerInformation(Buyer $buyerInformation)
    {
        $this->buyerInformation = $buyerInformation;
    }

    /**
     * @return BasketProduct
     */
    public function getBasketProduct()
    {
        return $this->basketProduct;
    }

    /**
     * @param array;
     */
    public function setBasketProduct($basketProducts)
    {
        $this->basketProduct = $basketProducts;
    }

    /**
     * @return Customer
     */
    public function getCustomerInformation()
    {
        return $this->customerInformation;
    }

    /**
     * @param Customer $customerInformation  
     */
    public function setCustomerInformation(Customer $customerInformation)
    {
        $this->customerInformation = $customerInformation;
    }

    /**
     * @return integer
     */
    public function getReturnHash()
    {
        return $this->returnHash;
    }

    /**
     * @param integer $returnHash  
     */
    public function setReturnHash($returnHash)
    {
        $this->returnHash = $returnHash;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl  
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return integer
     */
    public function getRedirectType()
    {
        return $this->redirectType;
    }

    /**
     * @param integer $redirectType  
     */
    public function setRedirectType($redirectType)
    {
        $this->redirectType = $redirectType;
    }

    public function toArray()
    {
        return [
            'CardHolderFullName' => $this->getCardHolderFullName(),
            'CardNumber' => $this->getCardNumber(),
            'ExpMonth' => $this->getExpMonth(),
            'ExpYear' => $this->getExpYear(),
            'CvcNumber' => $this->getCvcNumber(),
            'CardToken' => $this->getCardToken(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'InstallmentNumber' => $this->getInstallmentNumber(),
            'ClientIP' => $this->getClientIp(),
            'OtherTrxCode' => $this->getOtherTrxCode(),
            'SubMerchantName' => $this->getSubMerchantName(),
            'IsPoolPayment' => $this->getIsPoolPayment(),
            'IsTokenized' => $this->getIsTokenized(),
            'IntegratorId' => $this->getIntegratorId(),
            'Software' => $this->getSoftware(),
            'Description' => $this->getDescription(),
            'IsPreAuth' => $this->getIsPreAuth(),
            'BuyerInformation' => $this->getBuyerInformation(),
            'BasketProduct' => $this->getBasketProduct(),
            'CustomerInformation' => $this->getCustomerInformation(),
            'ReturnHash' => $this->getReturnHash(),
            'RedirectUrl' => $this->getRedirectUrl(),
            'RedirectType' => $this->getRedirectType()
        ];
    }
}
