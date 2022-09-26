<?php

namespace Moka\Model;

class RetrievePaymentPlanHistoryListRequest extends Model
{
    /**
     * @var integer
     */
    protected $dealerPaymentPlanId;

    /**
     * @return integer
     */
    public function getDealerPaymentPlanId()
    {
        return $this->dealerPaymentPlanId;
    }

    /**
     * @param integer $dealerPaymentPlanId  
     */
    public function setDealerPaymentPlanId($dealerPaymentPlanId)
    {
        $this->dealerPaymentPlanId = $dealerPaymentPlanId;
    }

    public function toArray()
    {
        return [
            'DealerPaymentPlanId' => $this->getDealerPaymentPlanId()
        ];
    }
}
