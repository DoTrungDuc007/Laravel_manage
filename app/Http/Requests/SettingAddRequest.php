<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key'=>'required|unique:settings|max:255',
            'config_value'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'config_key.required' => 'config_key not space',
            'config_key.unique'=>'config_key not same',
            'config_key.max'=>'config_key not than 255 characters',
            'config_value.required'=>'config_value not space'
        ];
    }
}
