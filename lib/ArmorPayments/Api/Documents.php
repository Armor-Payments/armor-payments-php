<?php
namespace ArmorPayments\Api;

class Documents extends \ArmorPayments\Api\Resource {
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}
}
