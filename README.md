# Moka United API PHP Client

The Moka United API PHP Client provides convenient access to the [Moka United API](https://developer.mokaunited.com/) from applications written in the PHP language.

![image](https://optimisthub.com/cdn/moka/moka-api-php-client.png?v4)

## Requirements

PHP 5.6.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require moka/moka-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/optimisthub/moka-php/releases). Then, to use the bindings, include the `autoload.php` file.

```php
require_once('autoload.php');
```

## Dependencies

The bindings require the following extensions in order to work properly:

-   [`curl`](https://secure.php.net/manual/en/book.curl.php)
-   [`json`](https://secure.php.net/manual/en/book.json.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

# SSL / TLS
PCI-DSS rules only allow the use of TLS 1.2 and above protocols. Please ensure that your application POST to Moka URL over these protocols. Otherwise, errors such as 'Connection will be closed or Connection Closed' will be received.

## Getting Started

Simple usage looks like

```php
$moka = new \Moka\MokaClient([
    'dealerCode' => 'xxx',
    'username' => 'xxx',
    'password' => 'xxx',    
]);
```
By default PHP client connects to Live Environment URL: https://service.moka.com For testing purposes please use Test Environment URL: https://service.refmoka.com

```php
$moka = new \Moka\MokaClient([
    'dealerCode' => 'xxx',
    'username' => 'xxx',
    'password' => 'xxx',    
    'baseUrl' => 'https://service.refmoka.com'
]);
```
## Create Payment

```php
$moka = new \Moka\MokaClient([
    'dealerCode' => 'xxx',
    'username' => 'xxx',
    'password' => 'xxx',    
]);

$request = new Moka\Model\CreatePaymentRequest();

$request->setCardHolderFullName('John Doe');
$request->setCardNumber('5555666677778888');
$request->setExpMonth('09');
$request->setExpYear('2024');
$request->setCvcNumber('123');
$request->setAmount(0.01);
$request->setCurrency('TL');
$request->setInstallmentNumber(1);
$request->setClientIp('192.168.1.116');
$request->setOtherTrxCode('3D5ABC24-456"');
$request->setIsPoolPayment(0);
$request->setIsTokenized(0);
$request->setIntegratorId(0);
$request->setSoftware('Software');
$request->setDescription('');
$request->setIsPreAuth(0);

$buyer = new Moka\Model\Buyer();
$buyer->setBuyerFullName('John Doe');
$buyer->setBuyerGsmNumber('5551110022');
$buyer->setBuyerEmail('email@email.com');
$buyer->setBuyerAddress('Levent Mah. Meltem Sok. İş Kuleleri Kule 2 No: 10 / 4 Beşiktaş / İstanbul');

$request->setBuyerInformation($buyer);

$payment = $moka->payments()->create($request);

$payment->getData();
$payment->getResultCode();
$payment->getResultMessage();
$payment->getException();
```
## Documentation

See the [Moka United API docs](https://developer.mokaunited.com).

## Test Cards

See the [Test Cards](https://developer.mokaunited.com/home.php?page=test-kartlari).
