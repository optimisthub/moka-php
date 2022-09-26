<?php

namespace Moka\Service;

use Moka\Model\CreateCardRequest;
use Moka\Model\DealerCustomerRequest;
use Moka\Model\DeleteCardRequest;
use Moka\Model\RetrieveCardListRequest;
use Moka\Model\RetrieveCardRequest;
use Moka\Model\UpdateCardRequest;

class CardService extends AbstractService
{
    /**
     * @param \Moka\Model\RetrieveCardListRequest $retrieveCardListRequest
     * @return \Moka\ApiResponse
     */
    public function all(RetrieveCardListRequest $retrieveCardListRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($retrieveCardListRequest);

        return $this->request('POST', '/DealerCustomer/GetCardList', $request);
    }

    /**
     * @param \Moka\Model\CreateCardRequest $createCardRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreateCardRequest $createCardRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($createCardRequest);

        return $this->request('POST', '/DealerCustomer/AddCard', $request);
    }

    /**
     * @param \Moka\Model\DeleteCardRequest $deleteCardRequest
     * @return \Moka\ApiResponse
     */
    public function delete(DeleteCardRequest $deleteCardRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($deleteCardRequest);

        return $this->request('POST', '/DealerCustomer/RemoveCard', $request);
    }

    /**
     * @param \Moka\Model\RetrieveCardRequest $retrieveCardRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrieveCardRequest $retrieveCardRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($retrieveCardRequest);

        return $this->request('POST', '/DealerCustomer/GetCard', $request);
    }

    /**
     * @param \Moka\Model\UpdateCardRequest $updateCardRequest
     * @return \Moka\ApiResponse
     */
    public function update(UpdateCardRequest $updateCardRequest)
    {
        $request = new DealerCustomerRequest();
        $request->setDealerCustomerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerCustomerRequest($updateCardRequest);

        return $this->request('POST', '/DealerCustomer/UpdateCard', $request);
    }
}
