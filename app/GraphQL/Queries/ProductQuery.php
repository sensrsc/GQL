<?php

namespace App\GraphQL\Queries;

use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

use App\Services\ProductService;

class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'product query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('product'));
    }

    public function args(): array
    {
        return [
             'productId' => ['name' => 'productId', 'type' => Type::int()],
        ];
    }

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @SuppressWarnings("unused")
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->productService->search($args);
    }
}
