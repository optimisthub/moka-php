<?php

namespace Moka\Service;

use Moka\Model\CreateSaleRequest;
use Moka\Model\DealerSaleRequest;
use Moka\Model\DeleteSaleRequest;
use Moka\Model\RetrieveSaleRequest;
use Moka\Model\UpdateSaleRequest;

class SaleService extends AbstractService
{
    /**
     * @return \Moka\ApiResponse
     */
    public function all()
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());

        return $this->request('POST', '/DealerSale/GetSaleList', $request);
    }

    /**
     * @param \Moka\Model\CreateSaleRequest $createSaleRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreateSaleRequest $createSaleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($createSaleRequest);

        return $this->request('POST', '/DealerSale/AddSale', $request);
    }

    /**
     * @param \Moka\Model\DeleteSaleRequest $deleteSaleRequest
     * @return \Moka\ApiResponse
     */
    public function delete(DeleteSaleRequest $deleteSaleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($deleteSaleRequest);

        return $this->request('POST', '/DealerSale/DeleteSale', $request);
    }

    /**
     * @param \Moka\Model\RetrieveSaleRequest $retrieveSaleRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrieveSaleRequest $retrieveSaleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($retrieveSaleRequest);

        return $this->request('POST', '/DealerSale/GetSale', $request);
    }

    /**
     * @param \Moka\Model\UpdateSaleRequest $updateSaleRequest
     * @return \Moka\ApiResponse
     */
    public function update(UpdateSaleRequest $updateSaleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($updateSaleRequest);

        return $this->request('POST', '/DealerSale/UpdateSale', $request);
    }
}
