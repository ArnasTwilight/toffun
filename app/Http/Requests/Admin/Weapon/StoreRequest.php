<?php

namespace App\Http\Requests\Admin\Weapon;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'required|file',
            'shatter' => 'required|numeric',
            'charge' => 'required|numeric',
            'element_id' => 'required|integer',
            'rarity_id' => 'required|integer',
        ];
    }
}
