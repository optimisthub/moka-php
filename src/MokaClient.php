<?php

namespace Moka;

use Moka\Service\BinNumberService;
use Moka\Service\CardService;
use Moka\Service\CustomerService;
use Moka\Service\DealerService;
use Moka\Service\PaymentLinkService;
use Moka\Service\PaymentPlanService;
use Moka\Service\PaymentService;
use Moka\Service\ProductService;
use Moka\Service\RefundService;
use Moka\Service\ReportingService;
use Moka\Service\SaleService;
use Moka\Service\ScheduleService;
use Moka\Service\TransactionService;

class MokaClient extends BaseMokaClient
{
    protected $binNumberService;

    /**
     * @return BinNumberService
     */
    public function binNumber()
    {
        if (is_null($this->binNumberService)) {
            $this->binNumberService = new BinNumberService($this);
        }

        return $this->binNumberService;
    }

    protected $cardService;

    /**
     * @return CardService
     */
    public function cards()
    {
        if (is_null($this->cardService)) {
            $this->cardService = new CardService($this);
        }

        return $this->cardService;
    }

    protected $customerService;

    /**
     * @return CustomerService
     */
    public function customers()
    {
        if (is_null($this->customerService)) {
            $this->customerService = new CustomerService($this);
        }

        return $this->customerService;
    }

    protected $dealerService;

    /**
     * @return DealerService
     */
    public function dealers()
    {
        if (is_null($this->dealerService)) {
            $this->dealerService = new DealerService($this);
        }

        return $this->dealerService;
    }

    protected $paymentLinkService;

    /**
     * @return PaymentLinkService
     */
    public function paymentLinks()
    {
        if (is_null($this->paymentLinkService)) {
            $this->paymentLinkService = new PaymentLinkService($this);
        }

        return $this->paymentLinkService;
    }

    protected $paymentPlanService;

    /**
     * @return PaymentPlanService
     */
    public function paymentPlans()
    {
        if (is_null($this->paymentPlanService)) {
            $this->paymentPlanService = new PaymentPlanService($this);
        }

        return $this->paymentPlanService;
    }

    protected $paymentService;

    /**
     * @return PaymentService
     */
    public function payments()
    {
        if (is_null($this->paymentService)) {
            $this->paymentService = new PaymentService($this);
        }

        return $this->paymentService;
    }

    protected $productService;

    /**
     * @return ProductService
     */
    public function products()
    {
        if (is_null($this->productService)) {
            $this->productService = new ProductService($this);
        }

        return $this->productService;
    }

    protected $refundService;

    /**
     * @return RefundService
     */
    public function refunds()
    {
        if (is_null($this->refundService)) {
            $this->refundService = new RefundService($this);
        }

        return $this->refundService;
    }

    protected $reportingService;

    /**
     * @return ReportingService
     */
    public function reporting()
    {
        if (is_null($this->reportingService)) {
            $this->reportingService = new ReportingService($this);
        }

        return $this->reportingService;
    }

    protected $saleService;

    /**
     * @return SaleService
     */
    public function sales()
    {
        if (is_null($this->saleService)) {
            $this->saleService = new SaleService($this);
        }

        return $this->saleService;
    }

    protected $scheduleService;

    /**
     * @return ScheduleService
     */
    public function schedules()
    {
        if (is_null($this->scheduleService)) {
            $this->scheduleService = new ScheduleService($this);
        }

        return $this->scheduleService;
    }

    protected $transactionService;

    /**
     * @return TransactionService
     */
    public function transactions()
    {
        if (is_null($this->transactionService)) {
            $this->transactionService = new TransactionService($this);
        }

        return $this->transactionService;
    }
}
