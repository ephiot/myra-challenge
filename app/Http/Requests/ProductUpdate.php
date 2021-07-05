<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string|required|min:3',
            'description' => 'sometimes|string|required|max:2048',
            'brand' => 'sometimes|string|required|min:3',
            'price' => 'sometimes|required|numeric',
            'quantity' => 'sometimes|required|numeric'
        ];
    }
}
