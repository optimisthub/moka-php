<?php

namespace Moka\Service;

use Moka\Model\CreateRefundRequest;
use Moka\Model\PaymentDealerRequest;

class RefundService extends AbstractService
{
    /**
     * @param \Moka\Model\CreateRefundRequest $createRefundRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreateRefundRequest $createRefundRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($createRefundRequest);

        return $this->request('POST', '/PaymentDealer/DoCreateRefundRequest', $request);
    }
}
