<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'user type',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'userId' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'the id of the user',
                'alias' => 'user_id',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'the email of user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'the name of user',
            ],
            'mobile' => [
                'type' => Type::string(),
                'description' => 'the mobile number of user',
            ],
            'token' => [
                'type' => Type::string(),
                'description' => 'authorized token',
                'selectable' => false,
            ]
        ];
    }

    protected function resolveEmailField($root)
    {
        return strtolower($root->email);
    }
}
