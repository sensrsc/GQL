<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use ProductTrait, RefreshDatabase;

    private $count;
    private $product;

    public function setUp(): void
    {
        parent::setUp();
        $this->count = 3;
        $this->product = factory(Product::class, $this->count)->create();
    }

    public function testProductList()
    {
        $response = $this->request(['query' => $this->productListQuery()]);
        $response->assertStatus(200)->assertJsonCount($this->count, 'data.products')->assertJsonStructure([
            'data' => [
                'products' => [
                    '*' => [
                        'productId',
                        'slug',
                    ]
                ]
            ]
        ])->assertJsonFragment([
            'productId' => $this->product[0]->product_id,
            'slug' => $this->product[0]->slug,
        ]);
    }

    public function testProductIdQuery()
    {
        $response = $this->request(['query' => $this->productIdQuery($this->product[0]->product_id)]);
        $response->assertStatus(200)->assertJsonCount(1, 'data.products')->assertJsonStructure([
            'data' => [
                'products' => [
                    '*' => [
                        'productId',
                        'slug',
                    ]
                ]
            ]
        ])->assertJsonFragment([
            'productId' => $this->product[0]->product_id,
            'slug' => $this->product[0]->slug,
        ]);
    }
}
