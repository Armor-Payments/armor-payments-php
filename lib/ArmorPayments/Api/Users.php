<?php
namespace ArmorPayments\Api;

class Users extends \ArmorPayments\Api\Resource {
	/**
	 * Create a new user
	 * @param array $data
	 * @return Object The newly created User object
	 */
	public function create($data) {
		return $this->request('POST', $this->uri(), $data);
	}
	
	/**
	 * Update an existing user
	 * @param string $user_id
	 * @param array  $data
	 * @return Object The updated user object
	 */
	public function update($user_id, $data) {
		return $this->request('POST', $this->uri($user_id), $data);
	}

	public function authentications($user_id) {
		return new \ArmorPayments\Api\Authentications(
			$this->host,
			$this->authenticator,
			$this->uri($user_id));
	}
}
