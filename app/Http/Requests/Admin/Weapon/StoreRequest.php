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
            'image' => 'nullable|file',
            'shatter' => 'nullable|numeric',
            'charge' => 'nullable|numeric',
            'element_id' => 'nullable|integer',
            'rarity_id' => 'nullable|integer',

            'type' => 'array',
            'type.*' => 'required|numeric',
            'title_attacks' => 'array',
            'title_attacks.*' => 'required|string',
            'description' => 'array',
            'description.*' => 'required|string',
        ];
    }
}
