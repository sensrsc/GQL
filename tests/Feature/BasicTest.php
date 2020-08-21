<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    use AuthTrait;

    public function testGraphQLAlive()
    {
        $response = $this->request([]);
        $response->assertStatus(200)->assertExactJson([]);
    }
}
