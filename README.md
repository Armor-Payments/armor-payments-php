# ArmorPayments

This is intended to be a clean, idiomatic client for the [Armor Payments API](http://armorpayments.com/api). This will handle generating the authenticated headers and constructing the properly nested request URI, as well as parsing any response JSON for you.

## Installation

You can install using [composer](#composer) or from [source](#source). 

### Composer

If you don't have Composer [install](http://getcomposer.org/doc/00-intro.md#installation) it:
```
$ curl -s https://getcomposer.org/installer | php
```
Add this to your `composer.json`: 
```
{
	"require": {
		"armor-payments/armor-payments-php": "*"
	}
}
```
Refresh your dependencies:

	$ php composer.phar update
	

Then make sure to `require` the autoloader:
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
...
```
### Source

Download the armor-payments-php source:
```
$ git clone https://github.com/Armor-Payments/armor-payments-php
```
And then `require` all bootstrap files:
```php
<?php
require_once("/path/to/armor-payments-php/lib/ArmorPayments/ArmorPayments.php");
...
```
## Quickstart
```
curl -s http://getcomposer.org/installer | php

echo '{
	"require": {
		"armor-payments/armor-payments-php": "*"
	}
}' > composer.json

php composer.phar install

curl https://raw.githubusercontent.com/Armor-Payments/armor-payments-php/master/Example.php > Example.php

# Replace api_key and api_secret values with your own credentials
echo '<?php
$api_key = "ENTER_YOUR_API_KEY_HERE";
$api_secret = "ENTER_YOUR_API_SECRET_HERE";' > api_credentials.php

php Example.php
```

## Usage

The Armor Payments API is REST-ish and nested, so the client relies on chaining. We return an object (or array of objects) decoded from the JSON response if possible.

```php
require_once 'path_to_library_install/lib/ArmorPayments/ArmorPayments.php'

$client = new \ArmorPayments\Api('your-key', 'your-secret', $should_use_sandbox);

// There are two top-level resources: accounts and shipmentcarriers
// Querying users and orders requires an account_id

$client->accounts()->all();
$client->accounts()->get($account_id);

$client->shipmentcarriers()->all();
$client->shipmentcarriers()->get($carrier_id);

// From accounts, we chain users, orders, bank accounts

$client->accounts()->users($account_id)->all();
$client->accounts()->users($account_id)->get($user_id);

$client->accounts()->orders($account_id)->all();
$client->accounts()->orders($account_id)->get($order_id);

$client->accounts()->bankaccounts($account_id)->all();
$client->accounts()->bankaccounts($account_id)->get($bank_account_id);

// From orders, many things chain: documents, notes, disputes, shipments,
// payment instructions, order events

$client->accounts()->orders($account_id)->documents($order_id)->all();
$client->accounts()->orders($account_id)->documents($order_id)->get($document_id);

$client->accounts()->orders($account_id)->notes($order_id)->all();
$client->accounts()->orders($account_id)->notes($order_id)->get($note_id);

$client->accounts()->orders($account_id)->disputes($order_id)->all();
$client->accounts()->orders($account_id)->disputes($order_id)->get($dispute_id);

$client->accounts()->orders($account_id)->shipments($order_id)->all();
$client->accounts()->orders($account_id)->shipments($order_id)->get($shipment_id);

$client->accounts()->orders($account_id)->paymentinstructions($order_id)->all();

$client->accounts()->orders($account_id)->orderevents($order_id)->all();
$client->accounts()->orders($account_id)->orderevents($order_id)->get($event_id);

// From disputes, further things chain: documents, notes, offers

$client->accounts()->orders($account_id)->disputes($order_id)->documents($dispute_id)
	->all();
$client->accounts()->orders($account_id)->disputes($order_id)->documents($dispute_id)
	->get($document_id);

$client->accounts()->orders($account_id)->disputes($order_id)->notes($dispute_id)
	->all();
$client->accounts()->orders($account_id)->disputes($order_id)->notes($dispute_id)
	->get($note_id);

$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->all();
$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->get($offer_id);

// From offers, documents and notes chain

$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->documents($offer_id)->all();
$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->documents($offer_id)->get($document_id);

$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->notes($offer_id)->all();
$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->notes($offer_id)->get($note_id);
```

Some of the resource endpoints support Create/Update `POST` operations, and this client aims to support those as well:

```php
$client->accounts()->create($your_data);
$client->accounts()->update($account_id, $your_data);

$client->accounts()->bankaccounts($account_id)->create($your_data);

$client->accounts()->orders($account_id)->create($your_data);

$client->accounts()->orders($account_id)->shipments($order_id)->create($your_data);

$client->accounts()->orders($account_id)->documents($order_id)->create($your_data);
$client->accounts()->orders($account_id)->disputes($order_id)->documents($dispute_id)
	->create($your_data);
$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->documents($offer_id)->create($your_data);

$client->accounts()->orders($account_id)->notes($order_id)->create($your_data);
$client->accounts()->orders($account_id)->disputes($order_id)->notes($dispute_id)
	->create($your_data);
$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->notes($offer_id)->create($your_data);

$client->accounts()->orders($account_id)->update($order_id, $your_data);

$client->accounts()->orders($account_id)->disputes($order_id)->offers($dispute_id)
	->update($offer_id, $your_data);

$client->accounts()->users($account_id)->authentications($user_id)->create($your_data);
```

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request
