<?php

class UsersTest extends ApiTester
{
    protected $entity = 'App\Services\Users\Data\Entities\User';

    /** @test */
    public function it_fetches_users()
    {
        $this->makeRecords($this->entity);

        $this->getJson('api/v1/users');

        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_a_single_user()
    {
        $user = $this->makeRecord($this->entity);

        $user = $this->getJson('api/v1/users/'.$user->id)->data;

        $this->assertResponseOk();

        $this->assertObjectHasAttributes($user, ['email', 'first_name', 'last_name']);
    }

    /** @test */
    public function it_404s_if_user_is_not_found()
    {
        $this->getJson('api/v1/users/1');

        $this->assertResponseStatus(404);
    }

	/**
     * Get a User stub.
     *
     * @return array
     */
    protected function getStub()
    {
        return [
            'email' => $this->faker->email,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'password' => 'secret',
        ];
    }

}
