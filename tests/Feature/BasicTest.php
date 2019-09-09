<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    use TestTrait;

    public function testGraphQLAlive()
    {
        $response = $this->graphql([]);
        $response->assertStatus(200)->assertExactJson([]);
    }
}
