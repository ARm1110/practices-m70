<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    public function index(Request $request)
    {
        //find near location
        //first get restaurant location 
        $restaurant = Restaurant::select('restaurant_name', 'latitude', 'longitude')->where('is_active', true)->where('latitude', '!=', 'none')->where('longitude', '!=', 'none')->get();
        //get user location
        $user = User::with('addresses')->where('id', auth()->user()->id)->get();

        $user = $user->first()->addresses->where('is_active', '1')->first();
        $lat =  $user->latitude;
        $lon = $user->longitude;
        $rad = 6371; // radius of earth in km

        // $location
        //     =
        //     DB::table("restaurants")

        //     ->select(
        //         ["restaurants.id", "restaurants.restaurant_name"],
        //         DB::raw("$rad * acos(cos(radians(" . $lat . ")) 

        // * cos(radians(restaurants.latitude)) 

        // * cos(radians(restaurants.longitude) - radians(" . $lon . ")) 

        // + sin(radians(" . $lat . ")) 

        // * sin(radians(restaurants.latitude))) AS distance")
        //     )

        //     ->groupBy("restaurants.distance")

        //     ->get();
        $restaurant = Restaurant::select(DB::raw('*, ( 6367 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lon . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ) AS distance'))
            ->having(
                'distance',
                '<',
                5
            )
            ->orderBy('distance')
            ->get();




        return response()->json([
            'data' =>
            $restaurant,

        ], 200, []);
    }
}
