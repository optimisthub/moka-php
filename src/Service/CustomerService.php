<?php

namespace Moka\Service;

use Moka\Model\CreateCustomerRequest;
use Moka\Model\CreateCustomerWithCardRequest;
use Moka\Model\DealerCustomerRequest;
use Moka\Model\DeleteCustomerRequest;
use Moka\Model\RetrieveCustomerRequest;
use Moka\Model\UpdateCustomerRequest;

class CustomerService extends AbstractService
{
    /**
     * @return \Moka\ApiResponse
     */
    public function all()
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());

        return $this->request('POST', '/DealerCustomer/GetCustomerList', $request);
    }

    /**
     * @param \Moka\Model\CreateCustomerRequest $createCustomerRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreateCustomerRequest $createCustomerRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($createCustomerRequest);

        return $this->request('POST', '/DealerCustomer/AddCustomer', $request);
    }

    /**
     * @param \Moka\Model\CreateCustomerWithCardRequest $createCustomerWithCardRequest
     * @return \Moka\ApiResponse
     */
    public function createWithCard(CreateCustomerWithCardRequest $createCustomerWithCardRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($createCustomerWithCardRequest);

        return $this->request('POST', '/DealerCustomer/AddCustomerWithCard', $request);
    }

    /**
     * @param \Moka\Model\DeleteCustomerRequest $deleteCustomerRequest
     * @return \Moka\ApiResponse
     */
    public function delete(DeleteCustomerRequest $deleteCustomerRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($deleteCustomerRequest);

        return $this->request('POST', '/DealerCustomer/RemoveCustomer', $request);
    }

    /**
     * @param \Moka\Model\RetrieveCustomerRequest $retrieveCustomerRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrieveCustomerRequest $retrieveCustomerRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($retrieveCustomerRequest);

        return $this->request('POST', '/DealerCustomer/GetCustomer', $request);
    }

    /**
     * @param \Moka\Model\UpdateCustomerRequest $updateCustomerRequest
     * @return \Moka\ApiResponse
     */
    public function update(UpdateCustomerRequest $updateCustomerRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($updateCustomerRequest);

        return $this->request('POST', '/DealerCustomer/UpdateCustomer', $request);
    }
}
