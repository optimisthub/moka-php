<?php

require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/config.php');

$moka = new Moka\MokaClient(Config::options());

$retrieveInstallmentInfoRequest = new Moka\Model\RetrieveInstallmentInfoRequest();
$retrieveInstallmentInfoRequest->setBinNumber('453144');
$retrieveInstallmentInfoRequest->setCurrency('TL');
$retrieveInstallmentInfoRequest->setOrderAmount(100);
$retrieveInstallmentInfoRequest->setIsThreeD(1);
$retrieveInstallmentInfoRequest->setIsIncludedCommissionAmount(1);

$retrieveInstallmentInfo = $moka->payments()->retrieveInstallmentInfo($retrieveInstallmentInfoRequest);

$retrieveInstallmentInfo->getContent();
$retrieveInstallmentInfo->getData();
$retrieveInstallmentInfo->getResultCode();
$retrieveInstallmentInfo->getResultMessage();
$retrieveInstallmentInfo->getException();

print_r($retrieveInstallmentInfo->getContent());
