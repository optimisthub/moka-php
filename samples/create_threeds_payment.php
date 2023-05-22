<?php

require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/config.php');

$moka = new Moka\MokaClient(Config::options());

$createPaymentRequest = new Moka\Model\CreatePaymentRequest;

$createPaymentRequest->setCardHolderFullName('John Doe');
$createPaymentRequest->setCardNumber('5127541122223332');
$createPaymentRequest->setExpMonth('12');
$createPaymentRequest->setExpYear('2025');
$createPaymentRequest->setCvcNumber('123');
$createPaymentRequest->setAmount(0.01);
$createPaymentRequest->setCurrency('TL');
$createPaymentRequest->setInstallmentNumber(1);
$createPaymentRequest->setClientIp('192.168.1.116');
$createPaymentRequest->setOtherTrxCode('20210114172139');
$createPaymentRequest->setSubMerchantName('');
$createPaymentRequest->setIsPoolPayment(0);
$createPaymentRequest->setIsTokenized(0);
$createPaymentRequest->setIntegratorId(0);
$createPaymentRequest->setSoftware('Software');
$createPaymentRequest->setDescription('');
$createPaymentRequest->setIsPreAuth(0);
$createPaymentRequest->setReturnHash(1);
$createPaymentRequest->setRedirectUrl('https://service.testmoka.com/PaymentDealerThreeD?MyTrxCode=20210114172139');
$createPaymentRequest->setRedirectType(0);

$buyer = new Moka\Model\Buyer;
$buyer->setBuyerFullName('John Doe');
$buyer->setBuyerGsmNumber('5551110022');
$buyer->setBuyerEmail('email@email.com');
$buyer->setBuyerAddress('Levent Mah. Meltem Sok. İş Kuleleri Kule 2 No: 10 / 4 Beşiktaş / İstanbul');

$createPaymentRequest->setBuyerInformation($buyer);

$payment = $moka->payments()->createThreeds($createPaymentRequest);

$payment->getContent();
$payment->getData();
$payment->getResultCode();
$payment->getResultMessage();
$payment->getException();

print_r($payment->getContent());