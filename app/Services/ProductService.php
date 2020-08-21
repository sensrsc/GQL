<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;

class ProductService
{
    public function search($args)
    {
        if(isset($args['productId'])) {
            $product =  Product::where(['product_id' => $args['productId']])->get();
            throw_if($product->isEmpty(), \Exception::class, 'product not found');
            return $product;
        }
        return Product::all();
    }
}
