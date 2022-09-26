<?php

namespace Moka\Model;

class DealerStatementRequest extends Model
{
    /**
     * @var mixed
     */
    protected $dealerAuthentication;

    /**
     * @var mixed
     */
    protected $dealerStatementRequest;

    /**
     * @return mixed
     */
    public function getDealerAuthentication()
    {
        return $this->dealerAuthentication;
    }

    /**
     * @param mixed $dealerAuthentication  
     */
    public function setDealerAuthentication($dealerAuthentication)
    {
        $this->dealerAuthentication = $dealerAuthentication;
    }

    /**
     * @return mixed
     */
    public function getDealerStatementRequest()
    {
        return $this->dealerStatementRequest;
    }

    /**
     * @param mixed $dealerStatementRequest  
     */
    public function setDealerStatementRequest($dealerStatementRequest)
    {
        $this->dealerStatementRequest = $dealerStatementRequest;
    }

    public function toArray()
    {
        return [
            'DealerAuthentication' => $this->getDealerAuthentication(),
            'DealerStatementRequest' => $this->getDealerStatementRequest()
        ];
    }
}
