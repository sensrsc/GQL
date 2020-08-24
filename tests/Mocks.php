<?php

namespace Tests;

use Mockery;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Illuminate\Support\Facades\Crypt;

trait Mocks
{
    private $uuid = '253e0f90-8842-4731-91dd-0191816e6a28';
    private $token = 'eyJpdiI6IjZObFR2c3k3TmZWK0N4QkQ0ekp3UVE9PSIsInZhbHVlIjoiTkNIQmZhZ1ZSdjBvVWpNakJweHJOVEtnbFdtc1Z0K1ViZFhieERiZ1lyR3BlcmhRTVI1ak1rSlRNdUVDZlJoaSIsIm1hYyI6Ijg1YTJkNzI0Yzk0MmUwYjg5ZTIzNmM1M2M3NGMxNGQ5NGRjOTA5ZGY4YjJlZWRjMTFlYzVhOGY4ZGI3NzYxNWEifQ==';

    public function mockUuid()
    {
        $uuid = Uuid::fromString($this->uuid);
        $factoryMock = \Mockery::mock(UuidFactory::class . '[uuid4]', [
            'uuid4' => $uuid,
        ]);

        Uuid::setFactory($factoryMock);
    }

    public function mockCrypt()
    {
        Crypt::shouldReceive('encryptString')->once()->with($this->uuid)
            ->andReturn($this->token);
    }
}
