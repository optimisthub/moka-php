<?php

namespace Moka\Service;

use Moka\Model\PaymentDealerRequest;
use Moka\Model\RetrieveTransactionListRequest;

class TransactionService extends AbstractService
{
    /**
     * @param \Moka\Model\RetrieveTransactionListRequest $retrieveTransactionListRequest
     * @return \Moka\ApiResponse
     */
    public function all(RetrieveTransactionListRequest $retrieveTransactionListRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($retrieveTransactionListRequest);

        return $this->request('POST', '/PaymentDealer/GetPaymentTrxList', $request);
    }
}
