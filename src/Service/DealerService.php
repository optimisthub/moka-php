<?php

namespace Moka\Service;

use Moka\Model\DealerRequest;
use Moka\Model\RetrieveDealerRequest;

class DealerService extends AbstractService
{
    /**
     * @param \Moka\Model\RetrieveDealerRequest $retrieveDealerRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrieveDealerRequest $retrieveDealerRequest)
    {
        $request = new DealerRequest();
        $request->setDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerRequest($retrieveDealerRequest);

        return $this->request('POST', '/Dealer/GetDealer', $request);
    }
}
