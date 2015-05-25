<?php

use Faker\Factory as Faker;

class ApiTester extends TestCase {

	/**
	 * @var Faker\Generator
	 */
	protected $faker;

	/**
	 * @var int
	 */
	protected $times = 1;

	/**
	 * ApiTester constructor.
	 */
	public function __construct()
	{
		$this->faker = Faker::create();
	}

	/**
	 * @param $count
	 * @return $this
	 */
	public function times($count)
	{
		$this->times = $count;

		return $this;
	}

	/**
	 * @param $uri
	 * @return string
	 */
	protected function getJson($uri)
	{
		return json_decode(
			$this->call('GET', $uri)->getContent()
		);
	}

	/**
	 * Setup the test.
	 *
	 */
	public function setUp()
	{
		parent::setUp();

		Artisan::call('migrate');
	}

	/**
	 * @param $object
	 * @param $attributes
	 */
	protected function assertObjectHasAttributes($object, $attributes)
	{
		foreach ($attributes as $attribute)
		{
			$this->assertObjectHasAttribute($attribute, $object);
        }
	}

	/**
	 * Make one entity record.
	 *
	 * @param $type
	 * @param array $fields
	 */
	protected function makeRecord($type, array $fields = [])
	{
		$stub = array_merge($this->getStub(), $fields);

		return $type::create($stub);
	}

	/**
	 * Make many entity records.
	 *
	 * @param $type
	 * @param array $fields
	 * @return array
	 */
	protected function makeRecords($type, array $fields = [])
	{
		$records = [];

		while($this->times--)
		{
			$records[] = $this->makeRecord($type, $fields);
		}

		return $records;
	}

}
