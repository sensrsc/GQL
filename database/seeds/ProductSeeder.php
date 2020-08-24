<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_id' => '1',
            'slug' => '【宜蘭賞櫻】宜蘭太平山森林秘境一日遊',
            'created_by' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D',
            'updated_by' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D'
        ]);
        Product::create([
            'product_id' => '2',
            'slug' => '巴黎羅浮宮門票｜語音導覽、英語導覽',
            'created_by' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D',
            'updated_by' => 'F6A08DA0-FFF2-4257-A62E-BD5CBE6F173D'
        ]);
    }
}
