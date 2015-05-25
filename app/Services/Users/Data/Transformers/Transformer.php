<?php

namespace App\Services\Users\Data\Transformers;

use PragmaRX\Sdk\Services\Transformer\Service\Transformer as AbstractTransformer;

class Transformer extends AbstractTransformer {

	public function transform($data)
	{
		return [
			'email' => $data['email'],
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
		];
	}

}
