<?php

namespace App\Http\Requests\Admin\Character;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'skills' => 'nullable|string',
            'trait' => 'nullable|string',
            'advancement' => 'nullable|string',
            'weapon_id' => 'nullable|integer',
            'spec_id' => 'nullable|integer',
            'rarity_id' => 'nullable|integer',
            'matrix_id' => 'nullable|integer',

            'C0' => 'nullable|string',
            'C1' => 'nullable|string',
            'C2' => 'nullable|string',
            'C3' => 'nullable|string',
            'C4' => 'nullable|string',
            'C5' => 'nullable|string',
            'C6' => 'nullable|string',
        ];
    }
}
