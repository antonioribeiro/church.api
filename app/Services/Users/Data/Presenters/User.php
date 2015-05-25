<?php

namespace App\Services\Users\Data\Presenters;

use PragmaRX\Sdk\Core\Data\Attributes\BusinessHiddenDaysPresenter;
use PragmaRX\Sdk\Services\Users\Data\Presenters\User as SdkUserPresenter;

class User extends SdkUserPresenter {

	use BusinessHiddenDaysPresenter;

}
