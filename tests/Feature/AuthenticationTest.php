<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    public function testMustEnterEmailAndPassword()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                'email' => ["The email field is required."],
                'password' => ["The password field is required."],
            ]);
    }

    public function testSuccessfulLogin()
    {
        $user = User::factory()->create([
            'password' => bcrypt('sample123'),
        ]);


        $loginData = ['email' => $user->email, 'password' => 'sample123'];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "user" => [
                    '_id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at',
                ],
                "token"
            ]);

        $this->assertAuthenticated('api');
    }
}
