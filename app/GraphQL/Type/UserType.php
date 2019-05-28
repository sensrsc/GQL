<?php

namespace App\GraphQL\Type;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => User::class,
    ];

    public function fields()
    {
        return [
            'userId' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
        ];
    }

    protected function resolveEmailField($root)
    {
        return strtolower($root->email);
    }

    protected function resolveUserIdField($root)
    {
        return $root->user_id;
    }
}
