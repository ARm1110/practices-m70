<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'body' => 'required|string|max:255',
            'menuItemsOrder_id' => 'required|integer|exists:menu_item_order,id',
            'rating' => 'required|integer|between:1,5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'body.required' => 'The comment body is required',
            'body.string' => 'The comment body must be a string',
            'body.max' => 'The comment body must be less than 255 characters',
            'menuItemsOrder_id.required' => 'The menu item order id is required',
            'menuItemsOrder_id.integer' => 'The menu item order id must be an integer',
            'menuItemsOrder_id.exists' => 'The menu item order id must exist',
            'rating.required' => 'The rating is required',
            'rating.integer' => 'The rating must be an integer',
            'rating.between' => 'The rating must be between 1 and 5',
        ];
    }
}
