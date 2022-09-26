<?php

namespace Moka\Service;

use Moka\Model\ApprovalRequest;
use Moka\Model\CancelApprovalRequest;
use Moka\Model\CancelPaymentRequest;
use Moka\Model\CaptureRequest;
use Moka\Model\CreateMobilePaymentRequest;
use Moka\Model\CreatePaymentRequest;
use Moka\Model\PaymentDealerRequest;
use Moka\Model\RetrievePaymentAmountRequest;
use Moka\Model\RetrievePaymentDetailRequest;
use Moka\Model\RetrievePaymentListRequest;
use Moka\Model\UpdatePaymentRequest;

class PaymentService extends AbstractService
{
    /**
     * @param \Moka\Model\RetrievePaymentListRequest $retrievePaymentListRequest
     * @return \Moka\ApiResponse
     */
    public function all(RetrievePaymentListRequest $retrievePaymentListRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($retrievePaymentListRequest);

        return $this->request('POST', '/PaymentDealer/GetPaymentList', $request);
    }

    /**
     * @param \Moka\Model\ApprovalRequest $approvalRequest
     * @return \Moka\ApiResponse
     */
    public function approval(ApprovalRequest $approvalRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($approvalRequest);

        return $this->request('POST', '/PaymentDealer/DoApprovePoolPayment', $request);
    }

    /**
     * @param \Moka\Model\CancelApprovalRequest $cancelApprovalRequest
     * @return \Moka\ApiResponse
     */
    public function cancelApproval(CancelApprovalRequest $cancelApprovalRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($cancelApprovalRequest);

        return $this->request('POST', '/PaymentDealer/UndoApprovePoolPayment', $request);
    }

    /**
     * @param \Moka\Model\CancelPaymentRequest $cancelPaymentRequest
     * @return \Moka\ApiResponse
     */
    public function cancel(CancelPaymentRequest $cancelPaymentRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($cancelPaymentRequest);

        return $this->request('POST', '/PaymentDealer/DoVoid', $request);
    }

    /**
     * @param \Moka\Model\CaptureRequest $captureRequest
     * @return \Moka\ApiResponse
     */
    public function capture(CaptureRequest $captureRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($captureRequest);

        return $this->request('POST', '/PaymentDealer/DoCapture', $request);
    }

    /**
     * @param \Moka\Model\CreatePaymentRequest $createPaymentRequest
     * @return \Moka\ApiResponse
     */
    public function create(CreatePaymentRequest $createPaymentRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($createPaymentRequest);

        return $this->request('POST', '/PaymentDealer/DoDirectPayment', $request);
    }

    /**
     * @param \Moka\Model\CreatePaymentRequest $createPaymentRequest
     * @return \Moka\ApiResponse
     */
    public function createThreeds(CreatePaymentRequest $createPaymentRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($createPaymentRequest);

        return $this->request('POST', '/PaymentDealer/DoDirectPaymentThreeD', $request);
    }

    /**
     * @param \Moka\Model\CreateMobilePaymentRequest $createMobilePaymentRequest
     * @return \Moka\ApiResponse
     */
    public function createThreedsMobile(CreateMobilePaymentRequest $createMobilePaymentRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($createMobilePaymentRequest);

        return $this->request('POST', '/PaymentDealer/DoDirectPaymentThreeDMobile', $request);
    }

    /**
     * @param \Moka\Model\RetrievePaymentDetailRequest $retrievePaymentDetailRequest
     * @return \Moka\ApiResponse
     */
    public function retrieve(RetrievePaymentDetailRequest $retrievePaymentDetailRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($retrievePaymentDetailRequest);

        return $this->request('POST', '/PaymentDealer/GetDealerPaymentTrxDetailList', $request);
    }

    /**
     * @param \Moka\Model\RetrievePaymentAmountRequest $retrievePaymentAmountRequest
     * @return \Moka\ApiResponse
     */
    public function retrieveAmount(RetrievePaymentAmountRequest $retrievePaymentAmountRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($retrievePaymentAmountRequest);

        return $this->request('POST', '/PaymentDealer/DoCalcPaymentAmount', $request);
    }

    /**
     * @param \Moka\Model\UpdatePaymentRequest $updatePaymentRequest
     * @return \Moka\ApiResponse
     */
    public function update(UpdatePaymentRequest $updatePaymentRequest)
    {
        $request = new PaymentDealerRequest();
        $request->setPaymentDealerAuthentication($this->getClient()->getAuthorizationParams());
        $request->setPaymentDealerRequest($updatePaymentRequest);

        return $this->request('POST', '/PaymentDealer/UpdateDealerPayment', $request);
    }
}
