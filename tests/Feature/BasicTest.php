<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    public function testProjectAliveTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testGraphQLAliveTest()
    {
        $response = $this->get('/graphql');
        $response->assertStatus(200)->assertExactJson([]);
    }
}
