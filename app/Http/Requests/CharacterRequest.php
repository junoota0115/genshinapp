<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'attribute' => 'required',
            'weapon_id' => 'required',
            
        ];

    }
    public function messages()
    {
        return [
            'name.required' => '入力してください',
            'attribute.required' => '未入力です',
            'weapon_id.required' => '未入力です',
        ];
        
    }
}
