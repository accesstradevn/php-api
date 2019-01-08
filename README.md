ACCESSTRADE PHP API
==================

A PHP wrapper around the ACCESSTRADE API. Full document can be found at http://docs.accesstrade.vn/publishers/

Install
-------

Install http://getcomposer.org/ and run the following command:

```
php composer.phar require accesstrade/api
```

Examples
-------

#### Authentication

To get access key, please visit: https://pub.accesstrade.vn/publisher_profile/personal_info?position=info

```php
$api = new AccessTrade\Api\Api('YOUR_ACCESS_KEY');
```

#### Methods
There are 2 common methods to communicate with api:
```php
$api = new AccessTrade\Api\Api($accessKey);

//for example
$api->getCampaigns();
```

Get transactions

```php
$transactions = $api->getTransactions();

foreach ($transaction as $transactions) {
    // do smth with transaction
}
```
