<?php

namespace Moka\Service;

use Moka\Model\CreatePaymentPlanRequest;
use Moka\Model\DealerSaleRequest;
use Moka\Model\DeletePaymentPlanRequest;
use Moka\Model\RetrievePaymentPlanHistoryListRequest;
use Moka\Model\RetrievePaymentPlanListRequest;
use Moka\Model\RetrievePaymentPlanRequest;
use Moka\Model\UpdatePaymentPlanRequest;

class PaymentPlanService extends AbstractService
{
    /**
     * @param \Moka\Model\RetrievePaymentPlanListRequest $retrievePaymentPlanListRequest
     * @return \Moka\ApiResponse
     */
    public function all(RetrievePaymentPlanListRequest $retrievePaymentPlanListRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($retrievePaymentPlanListRequest);

        return $this->request('POST', '/DealerSale/GetPaymentPlanList', $request);
    }

    /**
     * @param \Moka\Model\CreatePaymentPlanRequest $createPaymentPlanRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreatePaymentPlanRequest $createPaymentPlanRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($createPaymentPlanRequest);

        return $this->request('POST', '/DealerSale/AddPaymentPlan', $request);
    }

    /**
     * @param \Moka\Model\DeletePaymentPlanRequest $deletePaymentPlanRequest
     * @return \Moka\ApiResponse
     */
    public function delete(DeletePaymentPlanRequest $deletePaymentPlanRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($deletePaymentPlanRequest);

        return $this->request('POST', '/DealerSale/DeletePaymentPlan', $request);
    }

    /**
     * @param \Moka\Model\RetrievePaymentPlanRequest $retrievePaymentPlanRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrievePaymentPlanRequest $retrievePaymentPlanRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($retrievePaymentPlanRequest);

        return $this->request('POST', '/DealerSale/GetPaymentPlan', $request);
    }

    /**
     * @param \Moka\Model\RetrievePaymentPlanHistoryListRequest $retrievePaymentPlanHistoryListRequest
     * @return \Moka\ApiResponse
     */
    public function retrieveHistory(RetrievePaymentPlanHistoryListRequest $retrievePaymentPlanHistoryListRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($retrievePaymentPlanHistoryListRequest);

        return $this->request('POST', '/DealerSale/GetPaymentPlanHistoryList', $request);
    }

    /**
     * @param \Moka\Model\UpdatePaymentPlanRequest $updatePaymentPlanRequest
     * @return \Moka\ApiResponse
     */
    public function update(UpdatePaymentPlanRequest $updatePaymentPlanRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($updatePaymentPlanRequest);

        return $this->request('POST', '/DealerSale/UpdatePaymentPlan', $request);
    }
}
