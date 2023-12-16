<?php

namespace App\Services;

use App\Models\Product;

class ProductSevice
{
    public function create($data) {
        $product = new Product();
        $product->fill($data);
        $product->save();

        return $product;
        
    }

    public function update($id,$data) {
        $product = Product::findOrFail($id);
        $product->fill($data);
        $product->save();

        return $product;
        
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return true;

        
    }
}
