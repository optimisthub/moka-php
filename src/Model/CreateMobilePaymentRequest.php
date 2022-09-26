<?php

namespace Moka\Model;

class CreateMobilePaymentRequest extends Model
{
    /**
     * @var string
     */
    protected $paymentType;

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
     * @var string
     */
    protected $clientIp;

    /**
     * @var string
     */
    protected $redirectUrl;

    /**
     * @var integer
     */
    protected $redirectType;

    /**
     * @var string
     */
    protected $otherTrxCode;

    /**
     * @var integer
     */
    protected $isPoolPayment;

    /**
     * @var integer
     */
    protected $integratorId;

    /**
     * @var string
     */
    protected $software;

    /**
     * @var string
     */
    protected $subMerchantName;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Buyer
     */
    protected $buyerInformation;

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType  
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
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
     * @return integer
     */
    public function getIsPoolPayment()
    {
        return $this->isPoolPayment;
    }

    /**
     * @param integer $isPoolPayment  
     */
    public function setIsPoolPayment($isPoolPayment)
    {
        $this->isPoolPayment = $isPoolPayment;
    }

    /**
     * @return integer
     */
    public function getIntegratorId()
    {
        return $this->integratorId;
    }

    /**
     * @param integer $integratorId  
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
    public function setBuyerInformation($buyerInformation)
    {
        $this->buyerInformation = $buyerInformation;
    }

    public function toArray()
    {
        return [
            'PaymentType' => $this->getPaymentType(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'InstallmentNumber' => $this->getInstallmentNumber(),
            'ClientIP' => $this->getClientIp(),
            'RedirectURL' => $this->getRedirectUrl(),
            'RedirectType' => $this->getRedirectType(),
            'OtherTrxCode' => $this->getOtherTrxCode(),
            'IsPoolPayment' => $this->getIsPoolPayment(),
            'IntegratorId' => $this->getIntegratorId(),
            'Software' => $this->getSoftware(),
            'SubMerchantName' => $this->getSubMerchantName(),
            'Description' => $this->getDescription(),
            'BuyerInformation' => $this->getBuyerInformation()
        ];
    }
}
