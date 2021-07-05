<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Transformers\ProductRecord;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Must return all products
     *
     * @return void
     */
    public function test_must_return_all_products()
    {
        $firstRecord = Product::first();

        $response = $this->get('/api/products');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 3, fn ($json) =>
                $json->where('name', $firstRecord->name)
                     ->where('description', $firstRecord->description)
                     ->where('brand', $firstRecord->brand)
                     ->where('price', number_format($firstRecord->price, 2))
                     ->where('quantity', $firstRecord->quantity)
                     ->etc()
            )
        );
    }

    /**
     * Must find a product with term search
     *
     * @return void
     */
    public function test_must_find_a_product_with_term_search()
    {
        $firstRecord = Product::first();

        $response = $this->get('/api/products?q=achocolatado');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 1, fn ($json) =>
                $json->where('name', $firstRecord->name)
                     ->where('description', $firstRecord->description)
                     ->where('brand', $firstRecord->brand)
                     ->where('price', number_format($firstRecord->price, 2))
                     ->where('quantity', $firstRecord->quantity)
                     ->etc()
            )
        );
    }

    /**
     * Must return a product
     *
     * @return void
     */
    public function test_must_return_a_product()
    {
        $firstRecord = Product::first();

        $response = $this->get("/api/products/{$firstRecord->id}");

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.name', $firstRecord->name)
                 ->where('data.description', $firstRecord->description)
                 ->where('data.brand', $firstRecord->brand)
                 ->where('data.price', number_format($firstRecord->price, 2))
                 ->where('data.quantity', $firstRecord->quantity)
                 ->etc()
        );
    }

    /**
     * Must update a product
     *
     * @return void
     */
    public function test_must_update_a_product()
    {
        $firstRecord = Product::first();

        $response = $this->put("/api/products/{$firstRecord->id}", [
            'name' => 'novo',
            'description' => 'novo',
            'brand' => 'novo',
            'price' => 10,
            'quantity' => 10
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.name', 'novo')
                 ->where('data.description', 'novo')
                 ->where('data.brand', 'novo')
                 ->where('data.price', number_format($firstRecord->price, 2))
                 ->where('data.quantity', 10)
                 ->etc()
        );
    }

    /**
     * Must update partially a product
     *
     * @return void
     */
    public function test_must_update_partially_a_product()
    {
        $firstRecord = Product::first();

        $response = $this->put("/api/products/{$firstRecord->id}", [
            'name' => 'novo 2',
            'brand' => 'novo 2'
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.name', 'novo 2')
                 ->where('data.description', $firstRecord->description)
                 ->where('data.brand', 'novo 2')
                 ->where('data.price', number_format($firstRecord->price, 2))
                 ->where('data.quantity', $firstRecord->quantity)
                 ->etc()
        );
    }

    /**
     * Must destroy a product
     *
     * @return void
     */
    public function test_must_destroy_the_product_with_id_5()
    {
        $firstRecord = Product::first();

        $response = $this->delete("/api/products/{$firstRecord->id}");

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('data.name', $firstRecord->name)
                 ->where('data.description', $firstRecord->description)
                 ->where('data.brand', $firstRecord->brand)
                 ->where('data.price', number_format($firstRecord->price, 2))
                 ->where('data.quantity', $firstRecord->quantity)
                 ->etc()
        );
    }
}
