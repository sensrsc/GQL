<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args(): array
    {
        return [
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()]
        ];
    }

    /**
     * @SuppressWarnings("unused")
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $user = User::where(['email' => $args['email'], 'password' => hash('sha256', $args['password'])])->get();
        throw_if($user->isEmpty(), \Exception::class, 'login failed');
        return $user;
    }
}
