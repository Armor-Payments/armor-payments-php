<?php
namespace ArmorPayments\Api;

class Notes extends \ArmorPayments\Api\Resource {
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}
}
