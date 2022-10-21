<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // resource
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
