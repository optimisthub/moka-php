<?php

namespace Moka\Model;

class RetrieveCardRequest extends Model
{
    /**
     * @var string
     */
    protected $cardToken;

    /**
     * @return string
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param string $cardToken  
     */
    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
    }

    public function toArray()
    {
        return [
            'CardToken' => $this->getCardToken()
        ];
    }
}
