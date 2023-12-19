<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /*
    * cretae new Product
    * @var array $data
    *@return Product
    */
    
    public function create(array $data) :Product
    {
        $product = new Product();
        $product->fill($data);
        $product->save();

        return $product;        
    }

    public function update(int|Product $product, array $data):Product 
    {
        if(!($product instanceof Product)){
            $product = Product::findOrFail($product);
        }
        $product->fill($data);
        $product->save();
        
        return $product;
        
    }

    public function delete(int|Product $product):bool
     {
        if(!($product instanceof Product)){
            $product = Product::findOrFail($product);
        }
        $product->delete();
        return true;

        
    }

    
}
