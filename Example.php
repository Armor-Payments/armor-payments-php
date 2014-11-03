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

// Get a single account using its account_id
$account = $client->accounts()->get($account_id);
// Print out the information returned for the account
echo print_r($account, true)."\n";

// Get a list of users on the account. For a fresh install, this will be only
// the user who registered the API key
$users = $client->accounts()->users($account_id)->all();
// Print out the information returned for the users
echo print_r($users, true)."\n";
