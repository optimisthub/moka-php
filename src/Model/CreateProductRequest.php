<?php

namespace Moka\Model;

class CreateProductRequest extends Model
{
    /**
     * @var string
     */
    protected $productName;

    /**
     * @var string
     */
    protected $productCode;

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName  
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode  
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    public function toArray()
    {
        return [
            'ProductName' => $this->getProductName(),
            'ProductCode' => $this->getProductCode()
        ];
    }
}
