<?php
namespace ArmorPayments\Api;

class Offers extends \ArmorPayments\Api\Resource {
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}

	public function update($offer_id, $data) {
		return $this->request('POST', $this->uri($offer_id), $data);
	}

	public function documents($offer_id) {
		return new \ArmorPayments\Api\Documents(
			$this->host,
			$this->authenticator,
			$this->uri($offer_id));
	}

	public function notes($offer_id) {
		return new \ArmorPayments\Api\Notes(
			$this->host,
			$this->authenticator,
			$this->uri($offer_id));
	}
}
