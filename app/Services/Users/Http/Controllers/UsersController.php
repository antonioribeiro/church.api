<?php

namespace App\Services\Users\Http\Controllers;

use PragmaRX\Sdk\Core\ApiController;
use App\Services\Users\Data\Entities\User;
use App\Services\Users\Data\Transformers\Transformer;

class UsersController extends ApiController
{

	/**
	 * @var Transformer
	 */
	private $transformer;

	public function __construct(Transformer $transformer)
	{
		$this->transformer = $transformer;
	}

	/**
	 * Get all users.
	 *
	 * @return mixed
	 */
	public function index()
	{
		$users = User::all();

		return $this->respondWithSuccess($this->transformer->transformCollection($users));
	}

	/**
	 * Show one user.
	 *
	 * @param $id
	 * @return mixed
	 */
	public function show($id)
	{
		if ( ! $user = User::find($id))
		{
			return $this->respondNotFound();
		}

		return $this->respondWithSuccess($this->transformer->transform($user));
	}

}
