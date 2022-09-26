<?php

namespace Moka\Service;

use Moka\Model\CreatePaymentLinkRequest;
use Moka\Model\PaymentUserPosRequest;

class PaymentLinkService extends AbstractService
{
    /**
     * @param \Moka\Model\CreatePaymentLinkRequest $createPaymentLinkRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreatePaymentLinkRequest $createPaymentLinkRequest)
    {
        $request = new PaymentUserPosRequest();
        $request->setDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentUserPosRequest($createPaymentLinkRequest);

        return $this->request('POST', '/PaymentUserPos/CreateUserPosPayment', $request);
    }
}
