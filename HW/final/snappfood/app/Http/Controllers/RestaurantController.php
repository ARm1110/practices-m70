<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\FoodCategory;
use App\Models\MenuItem;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::select('*')->where('user_id', auth()->user()->id)->paginate(5);
        // dd($restaurants);
        return view('dashboard.restaurant.index', compact('restaurants'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        $restaurants = Restaurant::select('*')->get();

        return response()->json($restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'cities' =>
            City::select('id', 'city_name')
                ->where('is_active', '1')
                ->get(),
            'categories' =>
            Category::select('category_name', 'id')
                ->where('is_active', '1')
                ->get(),
        ];

        // dd('create');
        return view('dashboard.restaurant.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        // dd(auth()->user()->id,);
        try {
            Restaurant::create(
                [
                    'restaurant_name' => $request->name,
                    'phone_number' => $request->phone,
                    'description' => $request->description,
                    'opening_hours' => $request->opening_hours,
                    'closing_hours' => $request->closing_hours,
                    'latitude' => $request->lat,
                    'longitude' => $request->lng,
                    'city_id' => $request->city,
                    'category_id' => $request->category,
                    'user_id' => auth()->user()->id,


                ]
            );

            return redirect()->back()->with('message', 'add restaurant successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function showApi(Restaurant $restaurant)
    {

        $restaurant = Restaurant::select('*')
            ->where('id', request()->id)
            ->get();

        return response()->json($restaurant);
    }

    public function showFoodsApi()
    {

        $restaurant = FoodCategory::select('*')
            ->with(['menuItems', 'restaurant'])
            ->where('restaurant_id', request()->id)
            ->get();
        return response()->json($restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurant = Restaurant::find(request()->id);

        return view('dashboard.restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {

        try {
            $restaurant::where('id', $request->id)->update(
                [
                    'restaurant_name' => $request->restaurant_name,
                    'phone_number' => $request->phone,
                    'description' => $request->description,
                    'opening_hours' => $request->opening_hours,
                    'closing_hours' => $request->closing_hours,
                    'latitude' => $request->lat,
                    'longitude' => $request->lng,

                ]
            );

            return redirect()->back()->with('message', 'update restaurant successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        try {
            $restaurant::where('id', $request->id)->update(
                [
                    'is_active' => !$request->status,
                ]
            );
            return redirect()->back()->with('message', 'update status successfully !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
