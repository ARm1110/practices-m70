<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select('*')->with('addresses')->where('id', auth()->user()->id)->get();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        $user = User::find(auth()->user()->id);


        $address = new Address;
        $address->address_name = $request->name;
        $address->address_line_1 = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip_code = $request->zip_code;
        $address->is_active = false;
        $address->latitude = $request->lat;
        $address->longitude = $request->lon;
        $user->addresses()->save($address);
        $msg = [
            'status' => 'success',
            'message' => 'Address created successfully',
            'data' => $address
        ];
        return response()->json($msg, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        Address::where('is_active', 1)
            ->update(['is_active' => 0]);

        $address =  $address->updated([
            'is_active' => 1
        ]);
        $msg = [
            'status' => 'success',
            'message' => 'Address updated successfully',
            'data' => $address
        ];
        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
