<?php

namespace App\GraphQL\Types;

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

    public function fields(): array
    {
        return [
            'userId' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user',
                'alias' => 'user_id',
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
}
