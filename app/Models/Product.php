<?php

namespace App\Models;

use App\DTO\Product as ProductDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'brand',
        'price',
        'quantity'
    ];

    /**
     * Create a product from ProductDTO
     * 
     * @param  ProductDTO  $source  Data source
     * @return self
     */
    public static function createFromDTO(ProductDTO $source): self
    {
        $data = [];
        if (!is_null($source->name)) {
            $data['name'] = $source->name;
        }
        if (!is_null($source->description)) {
            $data['description'] = $source->description;
        }
        if (!is_null($source->brand)) {
            $data['brand'] = $source->brand;
        }
        if (!is_null($source->price)) {
            $data['price'] = $source->price;
        }
        if (!is_null($source->quantity)) {
            $data['quantity'] = $source->quantity;
        }
        return self::create($data);
    }

    /**
     * Get a product from ProductDTO
     * 
     * @param  ProductDTO  $source  Data source
     * @return mixed
     */
    public static function getFromDTO(ProductDTO $source): mixed
    {
        return  self::where('name', $source->product)
                    ->where('brand', $source->brand)
                    ->first();
    }

    /**
     * Fulltext search for specified terms
     * 
     * @param  string  $terms  Search terms
     * @return Collection
     */
    public static function searchFor(string $terms): Collection
    {
        return self::whereRaw(
            "MATCH (name, description, brand) AGAINST (? IN NATURAL LANGUAGE MODE)",
            [$terms]
        )->get();
    }

    /**
     * Update record from ProductDTO
     * 
     * @param  ProductDTO  $source  Data source
     * @return bool
     */
    public function updateFromDTO(ProductDTO $source): bool
    {
        if (!is_null($source->name)) {
            $this->name = $source->name;
        }
        if (!is_null($source->description)) {
            $this->description = $source->description;
        }
        if (!is_null($source->brand)) {
            $this->brand = $source->brand;
        }
        if (!is_null($source->price)) {
            $this->price = $source->price;
        }
        if (!is_null($source->quantity)) {
            $this->quantity = $source->quantity;
        }
        return $this->save();
    }
}
