<?php

namespace Moka\Service;

use Moka\Model\CreateProductRequest;
use Moka\Model\DealerSaleRequest;
use Moka\Model\DeleteProductRequest;

class ProductService extends AbstractService
{
    /**
     * @return \Moka\ApiResponse
     */
    public function all()
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());

        return $this->request('POST', '/DealerSale/GetProductList', $request);
    }

    /**
     * @param \Moka\Model\CreateProductRequest $createProductRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreateProductRequest $createProductRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($createProductRequest);

        return $this->request('POST', '/DealerSale/AddProduct', $request);
    }

    /**
     * @param \Moka\Model\DeleteProductRequest $deleteProductRequest
     * @return \Moka\ApiResponse
     */
    public function delete(DeleteProductRequest $deleteProductRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($deleteProductRequest);

        return $this->request('POST', '/DealerSale/DeleteProduct', $request);
    }
}
