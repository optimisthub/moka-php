<?php

namespace Moka\Model;

class CreateCustomerRequest extends Model
{
    /**
     * @var string
     */
    protected $customerCode;

    /**
     * @var string
     */
    protected $password;

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
    protected $gsmNumber;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $address;

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password  
     */
    public function setPassword($password)
    {
        $this->password = $password;
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

    public function toArray()
    {
        return [
            'CustomerCode' => $this->getCustomerCode(),
            'Password' => $this->getPassword(),
            'FirstName' => $this->getFirstName(),
            'LastName' => $this->getLastName(),
            'Gender' => $this->getGender(),
            'BirthDate' => $this->getBirthDate(),
            'GsmNumber' => $this->getGsmNumber(),
            'Email' => $this->getEmail(),
            'Address' => $this->getAddress()
        ];
    }
}
