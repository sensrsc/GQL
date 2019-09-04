<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;

class Session
{
    private const DURATION = 86400;

    public function set($user)
    {
        $sessionId = Uuid::uuid4()->toString();
        Redis::set($sessionId, $this->formatSession($user));
        Redis::expire($sessionId, self::DURATION);
        return Crypt::encryptString($sessionId);
    }

    public function get($token)
    {
        $sessionId = $this->decryptToken($token);
        return Redis::exists($sessionId) ? json_decode(Redis::get($sessionId), true) : [];
    }

    public function verify($token, $email)
    {
        $sessionData = Arr::only($this->get($token), ['user_oid', 'email', 'name']);
        return (Arr::get($sessionData, 'email') === $email) ? $sessionData : null;
    }

    public function destroy($token)
    {
        $sessionId = $this->decryptToken($token);
        return Redis::del($sessionId);
    }

    private function formatSession($user)
    {
        return json_encode(Arr::only($user->toArray(), ['user_id', 'email', 'name', 'role_id']));
    }

    private function decryptToken($token)
    {
        try {
            return Crypt::decryptString($token);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $exception) {
            throw new \Exception('aaa');
        }
    }
}
