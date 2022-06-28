<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ShopperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('ShopperController');

        return view('dashboard.shoppers.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopperController  $shopperController
     * @return \Illuminate\Http\Response
     */
    public function show(ShopperController $shopperController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopperController  $shopperController
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopperController $shopperController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopperController  $shopperController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopperController $shopperController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopperController  $shopperController
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopperController $shopperController)
    {
        //
    }
}
