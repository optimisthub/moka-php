<?php

namespace Moka\Model;

class CreatePaymentLinkRequest extends Model
{
    /**
     * @var string
     */
    protected $otherTrxCode;

    /**
     * @var integer
     */
    protected $dealerCustomerTypeId;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var string
     */
    protected $gsmNumber;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var integer
     */
    protected $isPoolPayment;

    /**
     * @var integer
     */
    protected $isPreAuth;

    /**
     * @var integer
     */
    protected $isTokenized;

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
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var integer
     */
    protected $gender;

    /**
     * @var string
     */
    protected $birthDate;

    /**
     * @var string
     */
    protected $customerGsmNumber;

    /**
     * @var string
     */
    protected $customerEmail;

    /**
     * @var string
     */
    protected $address;

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
    protected $setInstallmentBy;

    /**
     * @var integer
     */
    protected $commissionByDealer;

    /**
     * @var integer
     */
    protected $isCommissionDiffByDealer;

    /**
     * @var integer
     */
    protected $isThreeD;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $returnHash;

    /**
     * @var string
     */
    protected $redirectUrl;

    /**
     * @var Buyer
     */
    protected $buyerInformation;

    /**
     * @var BasketProduct
     */
    protected $basketProduct;

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
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName  
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getGsmNumber()
    {
        return $this->gsmNumber;
    }

    /**
     * @param string $gsmNumber  
     */
    public function setGsmNumber($gsmNumber)
    {
        $this->gsmNumber = $gsmNumber;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email  
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getIsPreAuth()
    {
        return $this->isPreAuth;
    }

    /**
     * @param integer $isPreAuth  
     */
    public function setIsPreAuth($isPreAuth)
    {
        $this->isPreAuth = $isPreAuth;
    }

    /**
     * @return integer
     */
    public function getIsTokenized()
    {
        return $this->isTokenized;
    }

    /**
     * @param integer $isTokenized  
     */
    public function setIsTokenized($isTokenized)
    {
        $this->isTokenized = $isTokenized;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName  
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName  
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param integer $gender  
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate  
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getCustomerGsmNumber()
    {
        return $this->customerGsmNumber;
    }

    /**
     * @param string $customerGsmNumber  
     */
    public function setCustomerGsmNumber($customerGsmNumber)
    {
        $this->customerGsmNumber = $customerGsmNumber;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail  
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address  
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
    public function getSetInstallmentBy()
    {
        return $this->setInstallmentBy;
    }

    /**
     * @param integer $setInstallmentBy  
     */
    public function setSetInstallmentBy($setInstallmentBy)
    {
        $this->setInstallmentBy = $setInstallmentBy;
    }

    /**
     * @return integer
     */
    public function getCommissionByDealer()
    {
        return $this->commissionByDealer;
    }

    /**
     * @param integer $commissionByDealer  
     */
    public function setCommissionByDealer($commissionByDealer)
    {
        $this->commissionByDealer = $commissionByDealer;
    }

    /**
     * @return integer
     */
    public function getIsCommissionDiffByDealer()
    {
        return $this->isCommissionDiffByDealer;
    }

    /**
     * @param integer $isCommissionDiffByDealer  
     */
    public function setIsCommissionDiffByDealer($isCommissionDiffByDealer)
    {
        $this->isCommissionDiffByDealer = $isCommissionDiffByDealer;
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

    /**
     * @return BasketProduct
     */
    public function getBasketProduct()
    {
        return $this->basketProduct;
    }

    /**
     * @param BasketProduct $basketProduct  
     */
    public function setBasketProduct(BasketProduct $basketProduct)
    {
        $this->basketProduct = $basketProduct;
    }

    public function toArray()
    {
        return [
            'OtherTrxCode' => $this->getOtherTrxCode(),
            'DealerCustomerTypeId' => $this->getDealerCustomerTypeId(),
            'FullName' => $this->getFullName(),
            'GsmNumber' => $this->getGsmNumber(),
            'Email' => $this->getEmail(),
            'IsPoolPayment' => $this->getIsPoolPayment(),
            'IsPreAuth' => $this->getIsPreAuth(),
            'IsTokenized' => $this->getIsTokenized(),
            'DealerCustomerId' => $this->getDealerCustomerId(),
            'CustomerCode' => $this->getCustomerCode(),
            'FirstName' => $this->getFirstName(),
            'LastName' => $this->getLastName(),
            'Gender' => $this->getGender(),
            'BirthDate' => $this->getBirthDate(),
            'CustomerGsmNumber' => $this->getCustomerGsmNumber(),
            'CustomerEmail' => $this->getCustomerEmail(),
            'Address' => $this->getAddress(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'InstallmentNumber' => $this->getInstallmentNumber(),
            'SetInstallmentBy' => $this->getSetInstallmentBy(),
            'CommissionByDealer' => $this->getCommissionByDealer(),
            'IsCommissionDiffByDealer' => $this->getIsCommissionDiffByDealer(),
            'IsThreeD' => $this->getIsThreeD(),
            'Description' => $this->getDescription(),
            'ReturnHash' => $this->getReturnHash(),
            'RedirectUrl' => $this->getRedirectUrl(),
            'BuyerInformation' => $this->getBuyerInformation(),
            'BasketProduct' => $this->getBasketProduct()
        ];
    }
}
