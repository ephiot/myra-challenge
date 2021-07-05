<?php

namespace Tests\Unit\DataMapper;

use App\DataMapper\Product as ProductDataMapper;
use App\DTO\Product as ProductDTO;
use App\Http\Requests\ProductStore;
use \Mockery as m;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * Must instantiate a ProductDTO from ProductStore request
     * 
     * @return void
     */
    public function test_must_instantiate_a_ProductDTO_from_ProductStore_request()
    {
        $name = 'name';
        $brand = 'brand';
        $price = (float) 1991;
        $description = 'description';
        $quantity = 10;

        $mock = m::mock(ProductStore::class);
        $mock->shouldReceive('input')->with('name')->andReturn($name);
        $mock->shouldReceive('input')->with('brand')->andReturn($brand);
        $mock->shouldReceive('input')->with('price')->andReturn($price);
        $mock->shouldReceive('input')->with('description')->andReturn($description);
        $mock->shouldReceive('input')->with('quantity')->andReturn($quantity);

        $dto = (new ProductDataMapper())->mapProductStore2ProductDTO($mock);

        $this->assertInstanceOf(ProductDTO::class, $dto);

        $this->assertEquals($name, $dto->name);
        $this->assertIsString($dto->name);

        $this->assertEquals($brand, $dto->brand);
        $this->assertIsString($dto->brand);

        $this->assertEquals($price, $dto->price);
        $this->assertIsFloat($dto->price);

        $this->assertEquals($description, $dto->description);
        $this->assertIsString($dto->description);

        $this->assertEquals($quantity, $dto->quantity);
        $this->assertIsInt($dto->quantity);
    }
}
