<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'firstName' => 'required|regex:/(^[a-zA-Z]+)/',
            'lastName' => 'required|regex:/(^[a-zA-Z]+)/',
            'phone' => 'required|regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/',
            'email' => 'required|email|unique:users,email',
            'city' => 'required|exists:cities,id',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',

        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => ':attributes is required',
            'firstName.regex' => ':attributes is not valid',
            'lastName.required' => ':attributes is required',
            'lastName.regex' => ':attributes is not valid',
            'phone.regex' => ':attributes is not valid',
            'phone.required' => ':attributes is required',
            'email.required' => ':attributes is required',
            'email.unique' => ':attributes already exists',
            'password.required' => ':attributes is required',
            'password.min' => ':attributes must be at least 6 characters',
            'password_confirmation.required' => ':attributes is required',
            'password_confirmation.same' => ':attributes must be same as password',
        ];
    }
}
