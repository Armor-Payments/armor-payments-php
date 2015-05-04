<?php

namespace ArmorPayments;

class Api {
	protected $authenticator;
	protected $sandbox;

	/**
	 * Construct an API client.
	 * 
	 * @param string $api_key    Your API key
	 * @param string $api_secret Your API secret
	 * @param bool   $sandbox    Use the testing Sandbox environment (rather than Production)?
	 */
	public function __construct($api_key, $api_secret, $sandbox = false) {
		$this->authenticator = new \ArmorPayments\Authenticator($api_key, $api_secret);
		$this->sandbox       = $sandbox;
	}

	public function accounts() {
		return new \ArmorPayments\Api\Accounts(
			$this->armor_host(),
			$this->authenticator,
			'');
	}

	public function shipmentcarriers() {
		return new \ArmorPayments\Api\ShipmentCarriers(
			$this->armor_host(),
			$this->authenticator,
			'');
	}

	///////////////////////////////////////////////////////////////////////
	// PROTECTED METHODS /////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////

	protected function armor_host() {
		$sub = $this->sandbox ? 'sandbox' : 'api';
		return "https://{$sub}.armorpayments.com";
	}
}
