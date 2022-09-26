<?php

namespace Moka\Service;

use Moka\Model\BankCardInformationRequest;
use Moka\Model\RetrieveBinNumberRequest;

class BinNumberService extends AbstractService
{
    /**
     * @param \Moka\Model\RetrieveBinNumberRequest $retrieveBinNumberRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrieveBinNumberRequest $retrieveBinNumberRequest)
    {
        $request = new BankCardInformationRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setBankCardInformationRequest($retrieveBinNumberRequest);

        return $this->request('POST', '/PaymentDealer/GetBankCardInformation', $request);
    }
}
