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
        //     'address_name',
        //     'address_line_1',
        //     'address_line_2',
        //     'city',
        //     'state',
        //     'zip_code',
        //     'latitude',
        //     'longitude',
        //     'is_active',
        $user = User::find(auth()->user()->id);

        // $address = Address::create([
        //     'address_name' => $request->name,
        //     'address_line_1' => $request->address,
        //     'city' => $request->city,
        //     'state' => $request->state,
        //     'zip_code' => $request->zip_code,
        //     'latitude' => $request->lat,
        //     'longitude' => $request->lon,
        // ]);
        $address = new Address;
        $address->address_name = $request->name;
        $address->address_line_1 = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip_code = $request->zip_code;
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
        return response()->json($this->getIp());
        $ip = '50.90.0.1';
        $data = \Location::get($ip);
        dd($data);
        $address->updated($request->all());
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
