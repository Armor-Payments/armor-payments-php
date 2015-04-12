<?php
namespace ArmorPayments\Api;

class Orders extends \ArmorPayments\Api\Resource {
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}

	public function update($order_id, $data) {
		return $this->request('POST', $this->uri($order_id), $data);
	}

	public function documents($order_id) {
		return new \ArmorPayments\Api\Documents(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}

	public function notes($order_id) {
		return new \ArmorPayments\Api\Notes(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}

	public function disputes($order_id) {
		return new \ArmorPayments\Api\Disputes(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}

	public function milestones($order_id) {
		return new \ArmorPayments\Api\Milestones(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}

	public function orderevents($order_id) {
		return new \ArmorPayments\Api\OrderEvents(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}

	public function paymentinstructions($order_id) {
		return new \ArmorPayments\Api\PaymentInstructions(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}

	public function shipments($order_id) {
		return new \ArmorPayments\Api\Shipments(
			$this->host,
			$this->authenticator,
			$this->uri($order_id));
	}
}
