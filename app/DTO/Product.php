<?php

namespace App\DTO;

use App\Exceptions\InvalidYearException;
use DateTime;

class Product
{
    /**
     * @var  ?string  $name  Name
     */
    public ?string $name;

    /**
     * @var  ?string  $description  Description
     */
    public ?string $description;

    /**
     * @var  ?string  $brand  Brand
     */
    public ?string $brand;

    /**
     * @var  ?float  $price  Price
     */
    public ?float $price;

    /**
     * @var  ?int  $quantity  Quantity
     */
    public ?int $quantity;

    /**
     * Constructor
     * 
     * @param  ?string  $name  Name
     * @param  ?string  $description  Description
     * @param  ?string  $brand  Brand
     * @param  ?float  $price  Price
     * @param  ?int  $quantity  Quantity
     * @return void
     */
    public function __construct(
        ?string $name = null,
        ?string $description = null,
        ?string $brand = null,
        ?float $price = null,
        ?int $quantity = null
    ) {
        $this->setData($name, $description, $brand, $price, $quantity);
    }

    /**
     * Set data
     * 
     * @param  ?string  $name  Name
     * @param  ?string  $description  Description
     * @param  ?string  $brand  Brand
     * @param  ?float  $price  Price
     * @param  ?int  $quantity  Quantity
     * @return void
     */
    public function setData(
        ?string $name = null,
        ?string $description = null,
        ?string $brand = null,
        ?float $price = null,
        ?int $quantity = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->brand = $brand;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
