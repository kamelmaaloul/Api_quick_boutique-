<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /*
    * cretae new Category
    * @var array $data
    *@return Category
    */
    
    public function create(array $data) :Category
    {
        $category = new Category();
        $category->fill($data);
        $category->save();

        return $category;        
    }

    public function update(int|Category $category, array $data):Category 
    {
        if(!($category instanceof Category)){
            $category = Category::findOrFail($category);
        }
        $category->fill($data);
        $category->save();
        
        return $category;
        
    }

    public function delete(int|Category $category):bool
     {
        if(!($category instanceof Category)){
            $category = Category::findOrFail($category);
        }
        $category->delete();
        return true;

        
    }

   
}
