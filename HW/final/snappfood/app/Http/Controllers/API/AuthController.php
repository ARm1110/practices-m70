<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AuthNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'city' => 'required',
            'phone' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);
        // dd($fields);
        $user = User::create([
            'firstName' => $fields['firstName'],
            'lastName' => $fields['lastName'],
            'city_id' => $fields['city'],
            'phone' => $fields['phone'],
            'email' => $fields['email'],
            'password' => $fields['password'],
            'is_active' => true,
            'role' => 'user'
        ]);


        //send notification to user
        $mail = [
            'name' =>  $user->firstName,
            'email' => $user->email,
            'user_id' => $user->id,
            'message' => 'welcome to the website',

        ];

        Notification::send($user, new AuthNotification($mail));



        $token = $user->createToken('appToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad gateway'
            ], 401);
        }

        $token = $user->createToken('appToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
