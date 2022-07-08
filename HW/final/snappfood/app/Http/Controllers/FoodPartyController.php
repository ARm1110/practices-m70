<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodPartyRequest;
use App\Http\Requests\UpdateFoodPartyRequest;
use App\Models\FoodParty;

class FoodPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreFoodPartyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodPartyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodParty  $foodParty
     * @return \Illuminate\Http\Response
     */
    public function show(FoodParty $foodParty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodParty  $foodParty
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodParty $foodParty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodPartyRequest  $request
     * @param  \App\Models\FoodParty  $foodParty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodPartyRequest $request, FoodParty $foodParty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodParty  $foodParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodParty $foodParty)
    {
        //
    }
}
