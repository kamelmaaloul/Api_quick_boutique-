<?php

namespace App\Http\Requests\Api\v1;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the category is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        $category = $this->route('category');
        if($category instanceof Category){
            $category = $category->id;
        }

        $rules = [
        'name'       => 'required|string|min:2|max:50',
        'position'   => 'numeric|min:1',
        'descrption' => 'required|string',
        'is_active'  => 'nullable|boolean',

    ];
       return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    
}
