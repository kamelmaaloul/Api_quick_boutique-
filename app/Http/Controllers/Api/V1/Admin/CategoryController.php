<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\CategoryRequest;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    
    private CategoryService $CategoryService;
    function __construct(CategoryService $CategoryService){
        $this->CategoryService=$CategoryService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::paginate();

        return CategoryResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $CategoryData = $this->CategoryService->create($request->validated());

        return CategoryResource::make($CategoryData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        return CategoryResource::make($Category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $order
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $Category)
    {

        $item_Category =$this->CategoryService->update($Category, $request->validated());
        return CategoryResource::make($item_Category);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $Category = $this->CategoryService->delete($Category);
        return $this->noContentresponse();

    }
}
