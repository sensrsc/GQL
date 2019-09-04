<?php

namespace App\Services;

use App\Models\User;
use Facades\App\Libraries\Session;
use Illuminate\Support\Arr;

class UserService
{
    public function auth($args)
    {
        $user = User::where(['email' => $args['email'], 'password' => hash('sha256', $args['password'])])->first();
        throw_if(empty($user), \Exception::class, 'login failed');
        return Arr::add($user, 'token', Session::set($user));
    }
}
