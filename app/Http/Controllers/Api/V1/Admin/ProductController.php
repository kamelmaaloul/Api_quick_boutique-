<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ProductRequest;
use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Http\Resources\Api\V1\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    
    private ProductService $productService;
    function __construct(ProductService $productService){
        $this->productService=$productService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = product::paginate();

        return ProductResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $productData = $this->productService->create($request->validated());

        return productResource::make($productData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $order
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return ProductResource::make($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\product  $order
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {

        $item_product =$this->productService->update($product, $request->validated());
        return ProductResource::make($item_product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = $this->productService->delete($product);
        return $this->noContentresponse();

    }
}
