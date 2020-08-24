<?php

namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'product',
        'description' => 'product type',
        'model' => Product::class,
    ];

    public function fields(): array
    {
        return [
            'productId' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'the id of the product',
                'alias' => 'product_id',
            ],
            'slug' => [
                'type' => Type::string(),
                'description' => 'product slug',
            ],
        ];
    }
}
