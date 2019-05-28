<?php

namespace App\GraphQL\Query;

use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User Query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args()
    {
        return [
            'userId' => ['name' => 'userId', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()]
        ];
    }

    public function resolve($args)
    {
        if (isset($args['userId'])) {
            return User::where('user_id', $args['userId'])->get();
        }
        if (isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }
        return User::all();
    }
}
