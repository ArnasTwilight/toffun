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
            'trait_1' => 'nullable|string',
            'trait_2' => 'nullable|string',
            'advancement' => 'nullable|string',
            'weapon_id' => 'nullable|integer',
            'spec_id' => 'nullable|integer',
            'rarity_id' => 'nullable|integer',
            'matrix_id' => 'nullable|integer',

            'C' => 'required|array',
            'C.*' => 'nullable|string',

            'id_effect' => 'nullable|array',
            'id_effect.*' => 'nullable|integer',

            'title_effect' => 'nullable|array',
            'title_effect.*' => 'nullable|string',

            'effect' => 'nullable|array',
            'effect.*' => 'nullable|string',
        ];
    }
}
