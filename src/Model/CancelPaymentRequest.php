<?php

namespace Moka\Model;

class CancelPaymentRequest extends Model
{
    /**
     * @var string
     */
    protected $virtualPosOrderId;

    /**
     * @var string
     */
    protected $otherTrxCode;

    /**
     * @var string
     */
    protected $clientIp;

    /**
     * @var integer
     */
    protected $voidRefundReason;

    /**
     * @return string
     */
    public function getVirtualPosOrderId()
    {
        return $this->virtualPosOrderId;
    }

    /**
     * @param string $virtualPosOrderId  
     */
    public function setVirtualPosOrderId($virtualPosOrderId)
    {
        $this->virtualPosOrderId = $virtualPosOrderId;
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
     * @return integer
     */
    public function getVoidRefundReason()
    {
        return $this->voidRefundReason;
    }

    /**
     * @param integer $voidRefundReason  
     */
    public function setVoidRefundReason($voidRefundReason)
    {
        $this->voidRefundReason = $voidRefundReason;
    }

    public function toArray()
    {
        return [
            'VirtualPosOrderId' => $this->getVirtualPosOrderId(),
            'OtherTrxCode' => $this->getOtherTrxCode(),
            'ClientIP' => $this->getClientIp(),
            'VoidRefundReason' => $this->getVoidRefundReason()
        ];
    }
}
