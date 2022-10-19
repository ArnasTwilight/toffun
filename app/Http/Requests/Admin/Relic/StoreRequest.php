<?php

namespace App\Http\Requests\Admin\Relic;

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
            'cooldown' => 'nullable|string',
            'description' => 'nullable|string',
            'one_star' => 'nullable|string',
            'two_star' => 'nullable|string',
            'three_star' => 'nullable|string',
            'four_star' => 'nullable|string',
            'five_star' => 'nullable|string',
            'rarity_id' => 'nullable|integer',
        ];
    }
}
