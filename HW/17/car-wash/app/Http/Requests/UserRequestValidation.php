<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequestValidation extends FormRequest
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
            'name' => "regex:/(^[a-z ,.'-]+)/",
            'phone' => 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributes is required',
            'name.regex' => ':attributes is not valid',
            'phone.regex' => ':attributes is not valid',
            'email.required' => ':attributes is required',
            'email.unique' => ':attributes already exists',
            'password.required' => ':attributes is required',
            'confirm_password.required' => ':attributes is required',
            'confirm_password.same' => ':attributes must be same as password',
        ];
    }
}
