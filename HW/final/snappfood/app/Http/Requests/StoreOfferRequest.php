<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'offer_name' => 'required|string|max:255|unique:offers,name',
            'offer_price' => 'required|numeric',
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
            'offer_name.required' => 'Offer Name is required',
            'offer_price.required' => 'Offer Price is required',
            'offer_price.numeric' => 'Offer Price must be a number',
            'offer_name.string' => 'Offer Name must be a string',
            'offer_name.unique' => 'Offer Name must be unique',
        ];
    }
}
