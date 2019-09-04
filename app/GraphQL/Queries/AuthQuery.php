<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Services\UserService;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class AuthQuery extends Query
{
    protected $attributes = [
        'name' => 'auth query'
    ];

    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return [
            'email' => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()]
        ];
    }

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @SuppressWarnings("unused")
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->userService->auth($args);
    }
}
