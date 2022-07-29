<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::select('*')->get();

        return response()->json($restaurants);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {

        $restaurant = Restaurant::select('*')
            ->where('id', request()->id)
            ->get();

        return response()->json($restaurant);
    }

    public function showFoods()
    {

        $restaurant = FoodCategory::select('*')
            ->with(['menuItems', 'restaurant'])
            ->where('restaurant_id', request()->id)
            ->get();
        return response()->json($restaurant);
    }
}
