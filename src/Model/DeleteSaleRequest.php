<?php

namespace Moka\Model;

class DeleteSaleRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerSaleId;

    /**
     * @var string
     */
    protected $saleCode;

    /**
     * @return integer
     */
    public function getDealerSaleId()
    {
        return $this->dealerSaleId;
    }

    /**
     * @param integer $dealerSaleId  
     */
    public function setDealerSaleId($dealerSaleId)
    {
        $this->dealerSaleId = $dealerSaleId;
    }

    /**
     * @return string
     */
    public function getSaleCode()
    {
        return $this->saleCode;
    }

    /**
     * @param string $saleCode  
     */
    public function setSaleCode($saleCode)
    {
        $this->saleCode = $saleCode;
    }

    public function toArray()
    {
        return [
            'DealerSaleId' => $this->getDealerSaleId(),
            'SaleCode' => $this->getSaleCode()
        ];
    }
}
