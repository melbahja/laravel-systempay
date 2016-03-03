# Create Systempay payment form for Laravel 5.x

## What is the point ?
The library provides an easy and fast systempay form creation. She helps to instanciate all required parameters and create the form to access to payment interface. To know required parameters, go to https://systempay.cyberpluspaiement.com/html/documentation.html

## Installation
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
## Configuration
By default, the package comes with an example configuration file : config/systempay.php
```php
return [

    'YOUR_SITE_ID' => [
        'key' => 'YOUR_KEY',
        'env' => 'PRODUCTION',
        'params' => [
            //Put here your generals payment call parameters
            'vads_page_action' => 'PAYMENT',
            'vads_action_mode' => 'INTERACTIVE',
            'vads_payment_config' => 'SINGLE',
            'vads_page_action' => 'PAYMENT',
            'vads_version' => 'V2',
            'vads_trans_date' => gmdate('YmdHis'),
            'vads_currency' => '978'
        ]
    ],
    //Systempay's url
    'url' => 'https://paiement.systempay.fr/vads-payment/',

];
```
In this file, you have to put your *site_id* and your *key*. This two parameters are given by Systempay. As you can see,
you can create a configuration array to several shops. In this array, you can also put generals parameters of your transaction.

### Test environment
If you are running your app in a test environment, you can override *key* and *env* parameters using .env file

Use this following constants names : SYSTEMPAY_<SITE_ID>_KEY and SYSTEMPAY_<SITE_ID>_ENV

## Create a payment form
Now we are finally ready to use the package! Here is a little example of code to explain how does it work
```php
    use Restoore\Systempay;
    ...
    //create a Systempay object class with your site id in parameter. Note that it will automatically get your configuration in config/systempay.php
    $systempay = new Systempay('12231221');
    //add some parameters
    $systempay->set_amount(1500)
        ->set_trans_id(1112441)
        ->set_order_info2('New customer !');
    //create the signature
    $systempay->set_signature();
    //create html systempay call form
    $payment_form = $systempay->get_form('<button class="btn btn-lg btn-primary btn-payment" type="submit">Valider et payer</button>');
    //pass the form to your view
    return view('registration.payment','payment_form'=> $payment_form);
```
#### What you have to know about this code
1. You can get and set all Systempay parameters using accessor
2. All setters are chainables functions
3. Signature will be automatically calculated and put to the parameters array. Don't use this function before giving all parameters.
4. *get_form* function takes the form button you want to show in parameter. Don't forget to use {!! !!} for surrounding the variable in your view.

    