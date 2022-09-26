<?php

namespace Moka\Model;

class RetrieveBinNumberRequest extends Model
{
    /**
     * @var string
     */
    protected $binNumber;

    /**
     * @return string
     */
    public function getBinNumber()
    {
        return $this->binNumber;
    }

    /**
     * @param string $binNumber  
     */
    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    public function toArray()
    {
        return [
            'BinNumber' => $this->getBinNumber()
        ];
    }
}
