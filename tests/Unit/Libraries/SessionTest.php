<?php

namespace Tests\Unit;

use App\Libraries\Session;
use App\Models\User;
use Tests\TestCase;

class SessionTest extends TestCase
{
    use \Tests\Mocks;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->token = 'eyJpdiI6IjZObFR2c3k3TmZWK0N4QkQ0ekp3UVE9PSIsInZhbHVlIjoiTkNIQmZhZ1ZSdjBvVWpNakJweHJOVEtnbFdtc1Z0K1ViZFhieERiZ1lyR3BlcmhRTVI1ak1rSlRNdUVDZlJoaSIsIm1hYyI6Ijg1YTJkNzI0Yzk0MmUwYjg5ZTIzNmM1M2M3NGMxNGQ5NGRjOTA5ZGY4YjJlZWRjMTFlYzVhOGY4ZGI3NzYxNWEifQ==';
    }

    public function testSet()
    {
        $this->mockUuid();
        $this->mockCrypt();

        $object = new Session();
        $token = $object->set($this->user);
        $this->assertEquals($token, $this->token);
    }
}
