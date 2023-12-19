<?php

namespace App\Http\Requests\Api\v1;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
        $user = $this->route('user');
        if($user instanceof User){
            $user = $user->id;
        }

        $rules = [
        'name'         => 'required|string|min:2|max:50',
        'email'        => 'required|email|'. Rule::unique('users')->ignore($user)->withoutTrashed(),
        'mobile'       => 'required|numeric|'. Rule::unique('users')->ignore($user)->withoutTrashed(),
        'password'     => 'confirmed|min:8',
        'gender'       => 'required|string|in:male,female',
        'address'      => 'required|string|min:5',
        ];
        if($this->isMethod(static::METHOD_PUT)){
            $rules['password'].='|nullable';
        } else {
            $rules['password'].='|required';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    
}
