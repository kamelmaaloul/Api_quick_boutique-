<?php

namespace App\Http\Requests\Api\v1;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class orderRequest extends FormRequest
{
    /**
     * Determine if the order is authorized to make this request.
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
        $order = $this->route('order');
        if($order instanceof Order){
            $order = $order->id;
        }

        $rules = [
        'code'         => 'required|numeric',
        'user_id'        => 'required|exists:users,id',
        'order_at'       => 'required|date',
        'status'     => 'required|in:pending,processing,success,rejected',
        'amount'       => 'required|numeric',
        'discount'      => 'required|numeric', 
        ];
        
        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    
}
