<?php
namespace ArmorPayments;

class Authenticator {
	protected $api_key;
	protected $api_secret;

	public function __construct($key, $secret) {
		$this->api_key    = $key;
		$this->api_secret = $secret;
	}

	/**
	 * Generate a set of secure request authentication headers.
	 * 
	 * @param string $method The HTTP request method (GET, POST)
	 * @param string $uri    The request URI
	 */
	public function secure_headers($method, $uri) {
		$timestamp = $this->current_timestamp();
		return array(
			'x-armorpayments-apikey'           => $this->api_key,
			'x-armorpayments-requesttimestamp' => $timestamp,
			'x-armorpayments-signature'        => $this->request_signature($method, $uri, $timestamp),
			);
	}

	///////////////////////////////////////////////////////////////////////
	// PROTECTED METHODS /////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////

	protected function current_timestamp() {
		return date('c');
	}

	protected function request_signature($method, $uri, $timestamp) {
		$method = strtoupper($method);
		return hash('sha512', "{$this->api_secret}:{$method}:{$uri}:{$timestamp}");
	}
}
