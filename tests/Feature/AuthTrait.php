<?php

namespace Tests\Feature;

trait AuthTrait
{
    public function request($query)
    {
        return $this->post('/graphql', $query);
    }

    public function authSuccessQuery($email, $password)
    {
        return "{
            auth (email: \"$email\", password: \"$password\") {
                userId
                email
                name
                mobile
                token
            }
        }";
    }

    public function authFailQuery($email, $incorrectPassword)
    {
        return "{
            auth (email: \"$email\", password: \"$incorrectPassword\") {
                userId
                email
                name
                mobile
                token
            }
        }";
    }
}
