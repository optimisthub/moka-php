<?php

namespace Moka\Model;

class RetrieveDealerRequest extends Model
{
    /**
     * @var string
     */
    protected $subDealerCode;

    /**
     * @return string
     */
    public function getSubDealerCode()
    {
        return $this->subDealerCode;
    }

    /**
     * @param string $subDealerCode  
     */
    public function setSubDealerCode($subDealerCode)
    {
        $this->subDealerCode = $subDealerCode;
    }

    public function toArray()
    {
        return [
            'SubDealerCode' => $this->getSubDealerCode()
        ];
    }
}
