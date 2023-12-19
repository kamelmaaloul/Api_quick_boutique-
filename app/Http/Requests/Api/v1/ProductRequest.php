<?php

namespace App\Http\Requests\Api\v1;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the product is authorized to make this request.
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
        $product = $this->route('product');
        if($product instanceof Product){
            $product = $product->id;
        }

        $rules = [
        'name'        => 'required|string|min:2|max:50',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'price'       => 'required|integer',
        'discount'    => 'required|numeric',
        'quantite'    => 'required|numeric',
        'images'      => 'required|file',
        'cover'       => 'required|file',
        'is_active'   => 'nullable|boolean',

        ];
        
        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    
}
