<?php

namespace Moka\Model;

class RetrieveScheduleRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerSaleScheduleId;

    /**
     * @return integer
     */
    public function getDealerSaleScheduleId()
    {
        return $this->dealerSaleScheduleId;
    }

    /**
     * @param integer $dealerSaleScheduleId  
     */
    public function setDealerSaleScheduleId($dealerSaleScheduleId)
    {
        $this->dealerSaleScheduleId = $dealerSaleScheduleId;
    }

    public function toArray()
    {
        return [
            'DealerSaleScheduleId' => $this->getDealerSaleScheduleId()
        ];
    }
}
