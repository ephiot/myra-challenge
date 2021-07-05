<?php

namespace Tests\Unit\DTO;

use App\DTO\Product as ProductDTO;
use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;
use TypeError;

class ProductTest extends TestCase
{
    /**
     * ProductDTO must be instantiated empty
     * 
     * @return void
     */
    public function test_ProductDTO_must_be_instantiated_empty()
    {
        $dto = new ProductDTO();

        $this->assertInstanceOf(ProductDTO::class, $dto);
    }

    /**
     * ProductDTO must be instantiated with values
     * 
     * @return void
     */
    public function test_ProductDTO_must_be_instantiated_with_values()
    {
        $name = 'name';
        $brand = 'brand';
        $price = (float) 1991;
        $description = 'description';
        $quantity = 10;

        $dto = new ProductDTO($name, $description, $brand, $price, $quantity);

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

    /**
     * Must assign product property directly
     * 
     * @return void
     */
    public function test_must_assign_product_property_directly()
    {
        $name = 'name';

        $dto = new ProductDTO();
        $dto->name = $name;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertIsString($dto->name);
        $this->assertEquals($name, $dto->name);
    }

    /**
     * Must throw exception while trying to bad assign product property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_product_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\Product::$name of type ?string');

        $badValue = (new DateTime())->setTimestamp(0);

        $dto = new ProductDTO();
        $dto->name = $badValue;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertIsString($dto->name);
        $this->assertEquals($badValue, $dto->name);
    }

    /**
     * Must assign brand property directly
     * 
     * @return void
     */
    public function test_must_assign_brand_property_directly()
    {
        $brand = 'name';

        $dto = new ProductDTO();
        $dto->brand = $brand;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertIsString($dto->brand);
        $this->assertEquals($brand, $dto->brand);
    }

    /**
     * Must throw exception while trying to bad assign brand property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_brand_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\Product::$brand of type ?string');

        $badValue = (new DateTime())->setTimestamp(0);

        $dto = new ProductDTO();
        $dto->brand = $badValue;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertIsString($dto->brand);
        $this->assertEquals($badValue, $dto->brand);
    }

    /**
     * Must assign description property directly
     * 
     * @return void
     */
    public function test_must_assign_description_property_directly()
    {
        $description = 'name';

        $dto = new ProductDTO();
        $dto->description = $description;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertIsString($dto->description);
        $this->assertEquals($description, $dto->description);
    }

    /**
     * Must throw exception while trying to bad assign description property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_description_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\Product::$description of type ?string');

        $badValue = (new DateTime())->setTimestamp(0);

        $dto = new ProductDTO();
        $dto->description = $badValue;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertIsString($dto->description);
        $this->assertEquals($badValue, $dto->description);
    }

    /**
     * Must assign price property directly
     * 
     * @return void
     */
    public function test_must_assign_price_property_directly()
    {
        $price = (float) 1991;

        $dto = new ProductDTO();
        $dto->price = $price;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertEquals($price, $dto->price);
        $this->assertIsFloat($dto->price);
    }

    /**
     * Must throw exception while trying to bad assign price property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_price_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign string to property App\DTO\Product::$price of type ?float');

        $badValue = 'bad value';

        $dto = new ProductDTO();
        $dto->price = $badValue;
    }

    /**
     * Must assign quantity property directly
     * 
     * @return void
     */
    public function test_must_assign_quantity_property_directly()
    {
        $quantity = 10;

        $dto = new ProductDTO();
        $dto->quantity = $quantity;

        $this->assertInstanceOf(ProductDTO::class, $dto);
        $this->assertEquals($quantity, $dto->quantity);
        $this->assertIsInt($dto->quantity);
    }

    /**
     * Must throw exception while trying to bad assign quantity property
     * 
     * @return void
     */
    public function test_must_throw_exception_while_trying_to_bad_assign_quantity_property()
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Cannot assign DateTime to property App\DTO\Product::$quantity of type ?int');

        $badValue = (new DateTime());

        $dto = new ProductDTO();
        $dto->quantity = $badValue;
    }
}
