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
// This example file demonstrates calls against several API resources and
// will allow you to determine that your api_key and api_secret values are
// correct. The calls in this example have been carefully selected to ensure
// that they are safe and repeatable.
//
// Once you have this working, check the /examples directory for an example
// for the specific order type you intend to use.
