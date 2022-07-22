<?php

namespace App\Http\Requests\Cart;

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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'menuId' => 'required|exists:menu_items,id',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'menu_item_id.required' => 'Menu item is required',
            'menu_item_id.exists' => 'Menu item does not exist',
            'quantity.required' => 'Quantity is required',
        ];
    }
}
