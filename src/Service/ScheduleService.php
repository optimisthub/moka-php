<?php

namespace Moka\Service;

use Moka\Model\CreateScheduleRequest;
use Moka\Model\DealerSaleRequest;
use Moka\Model\DeleteScheduleRequest;
use Moka\Model\RetrieveScheduleRequest;
use Moka\Model\UpdateScheduleRequest;

class ScheduleService extends AbstractService
{
    /**
     * @return \Moka\ApiResponse
     */
    public function all()
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());

        return $this->request('POST', '/DealerSale/GetScheduleList', $request);
    }

    /**
     * @param \Moka\Model\CreateScheduleRequest $createScheduleRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreateScheduleRequest $createScheduleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($createScheduleRequest);

        return $this->request('POST', '/DealerSale/AddSchedule', $request);
    }

    /**
     * @param \Moka\Model\DeleteScheduleRequest $deleteScheduleRequest
     * @return \Moka\ApiResponse
     */
    public function delete(DeleteScheduleRequest $deleteScheduleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($deleteScheduleRequest);

        return $this->request('POST', '/DealerSale/DeleteSchedule', $request);
    }

    /**
     * @param \Moka\Model\RetrieveScheduleRequest $retrieveScheduleRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrieveScheduleRequest $retrieveScheduleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($retrieveScheduleRequest);

        return $this->request('POST', '/DealerSale/GetSchedule', $request);
    }

    /**
     * @param \Moka\Model\UpdateScheduleRequest $updateScheduleRequest
     * @return \Moka\ApiResponse
     */
    public function update(UpdateScheduleRequest $updateScheduleRequest)
    {
        $request = new DealerSaleRequest();
        $request->setDealerSaleAuthentication($this->getClient()->getAuthorizationParams());
        $request->setDealerSaleRequest($updateScheduleRequest);

        return $this->request('POST', '/DealerSale/UpdateSchedule', $request);
    }
}
