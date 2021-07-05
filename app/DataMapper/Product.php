<?php

namespace App\DataMapper;

use App\DTO\Product as ProductDTO;
use App\Http\Requests\ProductStore;
use App\Http\Requests\ProductUpdate;

class Vehicle
{
    /**
     * Map ProductStore to ProductDTO
     * 
     * @param  ProductStore  $source  Data source
     * @return ProductDTO
     */
    public function mapProductStore2ProductDTO(ProductStore $source)
    {
        return new ProductDTO(
            $source->input('name'),
            $source->input('description'),
            $source->input('brand'),
            $source->input('price'),
            $source->input('quantity')
        );
    }

    /**
     * Map ProductUpdate to ProductDTO
     * 
     * @param  ProductUpdate  $source  Data source
     * @return ProductDTO
     */
    public function mapProductUpdate2ProductDTO(ProductUpdate $source)
    {
        return new ProductDTO(
            $source->input('name'),
            $source->input('description'),
            $source->input('brand'),
            $source->input('price'),
            $source->input('quantity')
        );
    }
}
