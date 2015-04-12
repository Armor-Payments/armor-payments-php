<?php
if (!function_exists('curl_init')) {
	throw new Exception('Armor Payments requires the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
	throw new Exception('Armor Payments requires the JSON PHP extension.');
}

// Commons
require_once __DIR__.'/Api.php';
require_once __DIR__.'/Authenticator.php';

// API Resources
require_once __DIR__.'/Api/Resource.php';
require_once __DIR__.'/Api/Accounts.php';
require_once __DIR__.'/Api/Authentications.php';
require_once __DIR__.'/Api/BankAccounts.php';
require_once __DIR__.'/Api/Disputes.php';
require_once __DIR__.'/Api/Documents.php';
require_once __DIR__.'/Api/Milestones.php';
require_once __DIR__.'/Api/Notes.php';
require_once __DIR__.'/Api/Offers.php';
require_once __DIR__.'/Api/OrderEvents.php';
require_once __DIR__.'/Api/Orders.php';
require_once __DIR__.'/Api/PaymentInstructions.php';
require_once __DIR__.'/Api/ShipmentCarriers.php';
require_once __DIR__.'/Api/Shipments.php';
require_once __DIR__.'/Api/Users.php';
