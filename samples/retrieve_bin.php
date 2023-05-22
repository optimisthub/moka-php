<?php

require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/config.php');

$moka = new Moka\MokaClient(Config::options());

$retrieveBinNumberRequest = new Moka\Model\RetrieveBinNumberRequest();
$retrieveBinNumberRequest->setBinNumber('453144');

$binNumber = $moka->binNumber()->retrieve($retrieveBinNumberRequest);

$binNumber->getContent();
$binNumber->getData();
$binNumber->getResultCode();
$binNumber->getResultMessage();
$binNumber->getException();

print_r($binNumber->getContent());
