<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(HomeRequest $request)
    {

        return view('home.dashboard');
    }

    public function loginPage()
    {

        return view('auth.login');
    }
    public function registerPage()
    {

        return view('auth.singUp');
    }
}
