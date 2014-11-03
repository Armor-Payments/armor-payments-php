<?php
namespace ArmorPayments\Api;

class Shipments extends \ArmorPayments\Api\Resource {
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}
}
