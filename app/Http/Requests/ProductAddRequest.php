<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name'=>'required|unique:products|max:255|min:3',
            'price'=>'required',
            'category_id'=>'required',
            'content'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name not space',
            'name.unique'=>'name not same',
            'name.max'=>'name not than 255 characters',
            'name.min'=>'name not less than 3 characters',
            'price.required'=>'price not space',
            'category_id.required'=>'category not space',
            'content.required'=>'content not space'
        ];
    }
}
