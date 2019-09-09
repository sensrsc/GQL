<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use TestTrait, RefreshDatabase;

    private $email;
    private $password;
    private $incorrectPassword;
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->email = 'test@gmail.com';
        $this->password = '123456';
        $this->incorrectPassword = '12345';
        $this->user = factory(User::class)->create(['email' => $this->email, 'password' => $this->password]);
    }

    private function authSuccessQuery()
    {
        return "{
            auth (email: \"$this->email\", password: \"$this->password\") {
                userId
                email
                name
                mobile
                token
            }
        }";
    }

    public function testAuthSuccess()
    {
        $response = $this->graphql(['query' => $this->authSuccessQuery()]);
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                'auth' => [
                    'email',
                    'mobile',
                    'name',
                    'token',
                    'userId'
                ]
            ]
        ])->assertJsonFragment([
            'email' => $this->user->email,
            'mobile' => $this->user->mobile,
            'name' => $this->user->name,
            'userId' => $this->user->user_id
        ]);
    }

    private function authFailQuery()
    {
        return "{
            auth (email: \"$this->email\", password: \"$this->incorrectPassword\") {
                userId
                email
                name
                mobile
                token
            }
        }";
    }

    public function testAuthFail()
    {
        $response = $this->graphql(['query' => $this->authFailQuery()]);
        $response->assertStatus(200)->assertExactJson([
            'data' => [
                'auth' => null
            ],
            'errors' => [
                ['message' => 'login failed']
            ]
        ]);
    }
}
