<?php

namespace Moka\Model;

class DeleteProductRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerProductId;

    /**
     * @var string
     */
    protected $productCode;

    /**
     * @return integer
     */
    public function getDealerProductId()
    {
        return $this->dealerProductId;
    }

    /**
     * @param integer $dealerProductId  
     */
    public function setDealerProductId($dealerProductId)
    {
        $this->dealerProductId = $dealerProductId;
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
            'DealerProductId' => $this->getDealerProductId(),
            'ProductCode' => $this->getProductCode()
        ];
    }
}
