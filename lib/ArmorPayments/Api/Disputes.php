<?php
namespace ArmorPayments\Api;

class Disputes extends \ArmorPayments\Api\Resource {
	public function documents($dispute_id) {
		return new \ArmorPayments\Api\Documents($this->host, $this->authenticator, $this->uri($dispute_id));
	}

	public function notes($dispute_id) {
		return new \ArmorPayments\Api\Notes($this->host, $this->authenticator, $this->uri($dispute_id));
	}

	public function offers($dispute_id) {
		return new \ArmorPayments\Api\Offers($this->host, $this->authenticator, $this->uri($dispute_id));
	}
}
