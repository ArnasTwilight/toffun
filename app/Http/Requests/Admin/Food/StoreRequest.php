<?php

namespace App\Http\Requests\Admin\Food;

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
            'image' => 'file',
            'bonus' => 'required|string',
            'rarity_id' => 'nullable|integer',
            'spec_id' => 'nullable|integer',
            'ingredient_ids' => 'nullable|array',
            'ingredient_ids.*' => 'nullable|integer|exists:ingredients,id',
        ];
    }
}
