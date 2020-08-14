<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'image' => 'mimes:jpg,jpeg,png',
            'discount' => 'required|numeric|min:0|max:100',
            'name' => 'required|min:6|max:50',
            'description' => 'required|min:6|max:255',
            'information' => 'required',
            'category_id' => 'required',
            'stock_amount' => 'required|numeric',
            'price' => 'required|numeric'
        ];
    }
}
