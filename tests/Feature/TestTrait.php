<?php

namespace Tests\Feature;

trait TestTrait
{
    public function graphql($query)
    {
        return $this->post('/graphql', $query);
    }
}
