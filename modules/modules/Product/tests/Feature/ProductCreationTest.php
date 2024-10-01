<?php

namespace Modules\Product\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Modules\Product\Models\Product;
use Modules\Product\Database\Factories\ProductFactory;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        // $products = Product::factory(3)->make();
        // $product = Product::find(1);

        // dd($products);
        $response->assertStatus(200);
    }
}
