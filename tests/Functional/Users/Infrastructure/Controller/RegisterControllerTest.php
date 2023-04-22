<?php

declare(strict_types=1);

namespace Tests\Functional\Users\Infrastructure\Controller;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use WithFaker;

    private string $uri;

    protected function setUp(): void
    {
        parent::setUp();
        $this->uri = '/api/create-user';
    }

    /**
     * @tests
     */
    public function test_created_users(): void
    {
        $params = [
            'name'  => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password(6),
        ];

        $response = $this->postJson($this->uri, $params);

        $response->assertStatus(Response::HTTP_OK);


        $response = $this->postJson($this->uri, $params);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson(['message' => 'This email is already exist']);

        unset($params['password']);

        $this->assertDatabaseHas('users', $params);
    }
}
