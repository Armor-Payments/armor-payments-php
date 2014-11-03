<?php
require_once __DIR__.'/lib/ArmorPayments/ArmorPayments.php';

// To run this example, you will need a working Sandbox API key, stored in a file.
// Make sure you create this file. It should contain your credentials in the
// following format:
//
// <?php
// $api_key    = "ENTER_YOUR_API_KEY_HERE";
// $api_secret = "ENTER_YOUR_API_SECRET_HERE";
//
require_once __DIR__.'/api_credentials.php';

$client = new \ArmorPayments\Api($api_key, $api_secret, true);

// Get a set of accounts. On a fresh install, this will include only your own account.
$accounts = $client->accounts()->all();

// Get the account_id of the first account returned
$account = array_pop($accounts);
$account_id = $account->account_id;

// It's also possible to get a single account using its account_id
$account = $client->accounts()->get($account_id);
// Print out the information returned for the account
echo print_r($account, true)."\n";

// Get a list of users on the account. For a fresh install, this will be only
// the user who registered the API key
$users = $client->accounts()->users($account_id)->all();

// Get the user_id of the first user returned
$user = array_pop($users);
$user_id = $user->user_id;

// It's also possible to get a single user using its account_id and user_id
$user = $client->accounts()->users($account_id)->get($user_id);
// Print out the information returned for the account
echo print_r($user, true)."\n";


exit;
// From here on out, we are no longer just pulling existing information from
// the system, we're making changes. Proceed with cuation!

// Create a new order. Normally, the buyer and seller would be different users,
// from different accounts, but for the sake of simplicity here, our user is
// going to sell something to themselves.
$orderData = array(
	'order_type'  => 1, // A standard escrow order for goods (see http://www.armorpayments.com/api/classes/ArmorPayments.Api.Entity.Order.html)
	'seller_id'   => $user_id,
	'buyer_id'    => $user_id,
	'amount'      => 1000,
	'summary'     => 'Test order',
	'description' => 'A test order from the armor-payments-php example script',
	);
$order = $client->accounts()->orders($account_id)->create($orderData);
