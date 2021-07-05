<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductRecord extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'name' => (string) $model->name,
            'description' => (string) $model->description,
            'brand' => (string) $model->brand,
            'price' => (float) $model->price,
            'quantity' => (int) $model->quantity,
            'created_at' => $model->created_at, //->format('d/m/Y H:i:s'),
            'updated_at' => $model->updated_at //->format('d/m/Y H:i:s')
        ];
    }
}
