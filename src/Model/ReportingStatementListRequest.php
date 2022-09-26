<?php

namespace Moka\Model;

class ReportingStatementListRequest extends Model
{
    /**
     * @var string
     */
    protected $statementStartDate;

    /**
     * @var string
     */
    protected $statementEndDate;

    /**
     * @var integer
     */
    protected $accountingId;

    /**
     * @var integer
     */
    protected $statementId;

    /**
     * @return string
     */
    public function getStatementStartDate()
    {
        return $this->statementStartDate;
    }

    /**
     * @param string $statementStartDate  
     */
    public function setStatementStartDate($statementStartDate)
    {
        $this->statementStartDate = $statementStartDate;
    }

    /**
     * @return string
     */
    public function getStatementEndDate()
    {
        return $this->statementEndDate;
    }

    /**
     * @param string $statementEndDate  
     */
    public function setStatementEndDate($statementEndDate)
    {
        $this->statementEndDate = $statementEndDate;
    }

    /**
     * @return integer
     */
    public function getAccountingId()
    {
        return $this->accountingId;
    }

    /**
     * @param integer $accountingId  
     */
    public function setAccountingId($accountingId)
    {
        $this->accountingId = $accountingId;
    }

    /**
     * @return integer
     */
    public function getStatementId()
    {
        return $this->statementId;
    }

    /**
     * @param integer $statementId  
     */
    public function setStatementId($statementId)
    {
        $this->statementId = $statementId;
    }

    public function toArray()
    {
        return [
            'StatementStartDate' => $this->getStatementStartDate(),
            'StatementEndDate' => $this->getStatementEndDate(),
            'AccountingId' => $this->getAccountingId(),
            'StatementId' => $this->getStatementId()
        ];
    }
}
