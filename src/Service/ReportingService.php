<?php

namespace Moka\Service;

use Moka\Model\DealerAccountingRequest;
use Moka\Model\DealerSaleRequest;
use Moka\Model\DealerStatementRequest;
use Moka\Model\ReportingAccountingListRequest;
use Moka\Model\ReportingPaymentPlanRequest;
use Moka\Model\ReportingStatementListRequest;

class ReportingService extends AbstractService
{
    /**
     * @param \Moka\Model\ReportingAccountingListRequest $reportingAccountingListRequest
     * @return \Moka\ApiResponse
     */
    public function accounting(ReportingAccountingListRequest $reportingAccountingListRequest)
    {
        $request = new DealerAccountingRequest();
        $request->setDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerAccountingRequest($reportingAccountingListRequest);

        return $this->request('POST', '/Dealer/GetAccountingList', $request);
    }

    /**
     * @param \Moka\Model\ReportingPaymentPlanRequest $reportingPaymentPlanRequest
     * @return \Moka\ApiResponse
     */
    public function paymentPlan(ReportingPaymentPlanRequest $reportingPaymentPlanRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($reportingPaymentPlanRequest);

        return $this->request('POST', '/DealerSale/GetPaymentPlanReport', $request);
    }

    /**
     * @param \Moka\Model\ReportingStatementListRequest $reportingStatementListRequest
     * @return \Moka\ApiResponse
     */
    public function statement(ReportingStatementListRequest $reportingStatementListRequest)
    {
        $request = new DealerStatementRequest();
        $request->setDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerStatementRequest($reportingStatementListRequest);

        return $this->request('POST', '/Dealer/GetStatementList', $request);
    }
}
