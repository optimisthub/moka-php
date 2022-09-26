<?php

namespace Moka\Model;

class UpdateCardRequest extends Model
{
    /**
     * @var string
     */
    protected $cardToken;

    /**
     * @var string
     */
    protected $cardName;

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

    /**
     * @return string
     */
    public function getCardName()
    {
        return $this->cardName;
    }

    /**
     * @param string $cardName  
     */
    public function setCardName($cardName)
    {
        $this->cardName = $cardName;
    }

    public function toArray()
    {
        return [
            'CardToken' => $this->getCardToken(),
            'CardName' => $this->getCardName()
        ];
    }
}
