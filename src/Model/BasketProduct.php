<?php

namespace Moka\Model;

class BasketProduct extends Model
{
    /**
     * @var integer
     */
    protected $productId;

    /**
     * @var string
     */
    protected $productCode;

    /**
     * @var integer
     */
    protected $unitPrice;

    /**
     * @var integer
     */
    protected $quantity;

    /**
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param integer $productId  
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return integer
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param integer $productCode  
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return integer
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param integer $unitPrice  
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity  
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function toArray()
    {
        return [
            'ProductId' => $this->getProductId(),
            'ProductCode' => $this->getProductCode(),
            'UnitPrice' => $this->getUnitPrice(),
            'Quantity' => $this->getQuantity()
        ];
    }
}
