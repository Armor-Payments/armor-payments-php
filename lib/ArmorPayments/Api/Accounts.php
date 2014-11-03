<?php
namespace ArmorPayments\Api;

class Accounts extends \ArmorPayments\Api\Resource {
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}
	
	public function update($account_id, $data) {
		return $this->request('POST', $this->uri($account_id), $data);
	}

	public function bankaccounts($account_id) {
		return new \ArmorPayments\Api\BankAccounts(
			$this->host,
			$this->authenticator,
			$this->uri($account_id));
	}

	public function orders($account_id) {
		return new \ArmorPayments\Api\Orders(
			$this->host,
			$this->authenticator,
			$this->uri($account_id));
	}

	public function users($account_id) {
		return new \ArmorPayments\Api\Users(
			$this->host,
			$this->authenticator,
			$this->uri($account_id));
	}
}
