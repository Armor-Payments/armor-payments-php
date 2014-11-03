<?php
namespace ArmorPayments\Api;

class Users extends \ArmorPayments\Api\Resource {
	/**
	 * Update an existing user
	 * @param string $user_id
	 * @param array  $data
	 * @return Object The updated user object
	 */
	public function update($user_id, $data) {
		return $this->request('POST', $this->uri($user_id), $data);
	}
}
