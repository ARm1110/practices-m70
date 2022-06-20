<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\logoutRequest;
use App\Http\Requests\UserRequestValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'phone', 'name', 'email', 'status', 'role', 'updated_at')->paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequestValidation $request)
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
            $user = User::find(request()->id);
            return view('users.show', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {

            User::where('id', $request->id)->update(
                [
                    'status' => !$request->status,
                ]
            );

            return redirect()->back()->with('message', 'User updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function register(UserRequestValidation $request)
    {

        try {
            User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => $request->password,
                ]
            );
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Something went wrong');
        }


        return redirect()->route('home')->with('message', 'Data added Successfully');
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'Login Success');
        }



        return back(302)->withInput()->with('error', 'something went wrong');
    }

    public function logout(logoutRequest $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'Logout Success');
    }

    public function filter(Request $request)
    {

        $user = User::select('*');

        // Search for a name.
        if (request()->has('name') && request()->input('name') != '') {
            $user->whereName(request()->input('name'));
        }

        // Search for a status
        if (request()->has('status') && request()->input('status') != '') {
            $user->where('status', '=', request()->input('status'));
        }



        $users = $user->paginate(5);

        // Get the results and return them.

        return view('users.index', compact('users'));
    }
}
