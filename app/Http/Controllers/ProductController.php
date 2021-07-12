<?php

namespace App\Http\Controllers;

use App\DataMapper\Product as ProductDataMapper;
use App\Http\Requests\ProductStore;
use App\Http\Requests\ProductUpdate;
use App\Models\Product;
use App\Transformers\ProductRecord;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $terms = $request->input('q', false);
        $orderBy = $request->input('order_by', false);
        $orderType = $request->input('order_type', false);

        $hasTerms = ($terms && is_string($terms));
        $hasOrder = ($orderBy && is_string($orderBy) && !empty($orderBy));

        if ($hasOrder) {
            $products = ($hasTerms) ? Product::searchFor($terms, $orderBy, $orderType) : Product::orderBy($orderBy, $orderType)->get();
        } else {
            $products = ($hasTerms) ? Product::searchFor($terms) : Product::all();
        }

        return fractal($products, new ProductRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
        $dto = (new ProductDataMapper())->mapProductStore2ProductDTO($request);

        $product = Product::createFromDTO($dto);

        return fractal($product, new ProductRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return fractal($product, new ProductRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdate  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, Product $product)
    {
        $dto = (new ProductDataMapper())->mapProductUpdate2ProductDTO($request);

        $product->updateFromDTO($dto);

        return fractal($product, new ProductRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return fractal($product, new ProductRecord())->respond(200, [], JSON_PRETTY_PRINT);
    }
}
