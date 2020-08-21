<?php

namespace Tests\Feature;

trait ProductTrait
{
    public function request($query)
    {
        return $this->post('/graphql/products', $query);
    }

    public function productListQuery()
    {
        return "{
            products {
                productId
                slug
            }
        }";
    }

    public function productIdQuery($productId)
    {
        return "{
            products (productId: $productId) {
                productId
                slug
            }
        }";
    }
}
