<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{


    public function login()
    {

        return view('auth.login');
    }
    public function register()
    {
        $data = [
            'countries' => City::select('id', 'city_name')->get(),
        ];
        return view('auth.register', compact('data'));
    }

    public function postLogin(LoginRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'Welcome to Snappfood');
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }
    public function postRegister(RegisterRequest $request)
    {

        try {

            $user = User::create(
                [
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city_id' => $request->city,
                    'password' => $request->password,
                ]
            );

            $hash = sha1($user->id . $user->email . $user->password);
            $filename = $hash . '.' . $request->profile_image->getClientOriginalExtension();

            // dd($request->file('profile_image'));
            $user->addMedia($request->file('profile_image'))
                ->usingFileName($filename)
                ->toMediaCollection();



            return redirect()->route('home.show.login')->with('message', 'create new account successfully');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong' . $th->getMessage());
        }
    }
    public function logout(LogoutRequest $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'Logout Success');
    }
}
