<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use AuthTrait, RefreshDatabase;

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

    public function testAuthSuccess()
    {
        $response = $this->request(['query' => $this->authSuccessQuery($this->email, $this->password)]);
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

    public function testAuthFail()
    {
        $response = $this->request(['query' => $this->authFailQuery($this->email, $this->incorrectPassword)]);
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
