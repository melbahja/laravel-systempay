# Create Systempay payment form for Laravel 5.x

## What is the point ?
The library provides an easy and fast systempay form creation. She helps to instanciate all required parameters and create the form to access to payment interface. To know required parameters, go to https://systempay.cyberpluspaiement.com/html/documentation.html

## Setup
First you need to add the component to your composer.json
```
composer require restoore/laravel-systempay
```
Update your packages with *composer update* or install with *composer install*.

After updating composer, add the ServiceProvider to the providers array and the Facade to the alias array in config/app.php
#### For Laravel >= 5.1
```php
  'providers' => [
      ...
      Restoore\Systempay\SystempayServiceProvider::class,
  ]
  ...
  'alias' => [
      ...
      Restoore\Systempay\SystempayFacade::class,
  ]
```
#### For Laravel 5.0
```php
  'providers' => [
      ...
      Restoore\Systempay\SystempayServiceProvider,
  ]
  ...
  'alias' => [
      ...
      Restoore\Systempay\SystempayFacade,
  ]
```
