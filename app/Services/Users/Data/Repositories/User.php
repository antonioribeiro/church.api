<?php

namespace App\Services\Users\Data\Repositories;

use PragmaRX\Sdk\Services\Users\Data\Repositories\UserRepository as SdkUserRepository;

class User extends SdkUserRepository {

	/**
	 * Update personal information.
	 *
	 * @param $user
	 * @param $council_id
	 * @param $council_registration_number
	 * @param $bio
	 * @return mixed
	 */
	public function updatePersonalInfo(
		$user,
		$council_id,
		$council_registration_number,
		$bio,
		$business_days,
		$business_hours_start,
		$business_hours_end
	)
	{
		$user->council_id = $council_id;

		$user->council_registration_number = $council_registration_number;

		$user->bio = $bio;

		$user->business_days = $business_days;

		$user->business_hours_start = $business_hours_start;

		$user->business_hours_end = $business_hours_end;

		$user->save();

		return $user;
	}

	public function findOrFail($user_id)
	{
		return User::findOrFail($user_id);
	}

}
