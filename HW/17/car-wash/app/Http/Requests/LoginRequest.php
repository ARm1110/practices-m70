<?php

namespace App\Http\Requests;

use App\Rules\PasswordCheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|',
        ];
    }
    public function massages()
    {
        return [
            'email.required' => ':attributes is required',
            'email.email' => ':attributes is not valid',
            'password.required' => ':attributes is required',
            'password.min' => ':attributes must be at least 6 characters',
        ];
    }
}
