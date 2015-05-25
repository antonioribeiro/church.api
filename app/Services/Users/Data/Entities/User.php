<?php

namespace App\Services\Users\Data\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use PragmaRX\Sdk\Core\Data\Attributes\BusinessHours;
use PragmaRX\Sdk\Services\Users\Data\Entities\User as SdkUserModel;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends SdkUserModel implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, BusinessHours;

	protected $presenter = 'App\Services\Users\Data\Presenters\User';

}
