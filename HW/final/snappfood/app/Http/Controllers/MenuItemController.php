<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkMenuItemRequest;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\FoodCategory;
use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Cache\CacheLock;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('MenuItemController');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO - Implement create() method.

        try {
            cache()->pull('menu_item_request');
            $restaurants = Restaurant::select('*')
                ->with('category')
                ->where('user_id', auth()->user()->id)
                ->where('is_active', true)
                ->get();
            $data = [
                'restaurants' => $restaurants,
            ];
            // return response()->json($restaurants);


            return view('dashboard.menu-item.create',   compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuItemRequest $request, MenuItem $menuItem)
    {


        try {
            $menuItem->created(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'restaurant_id' => $request->restaurant,
                    'category_id' => $request->category,
                    'user_id' => auth()->user()->id,
                    'is_active' => false,

                ]

            );


            return redirect()->back()->with('success', 'Menu Item Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuItemRequest  $request
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }

    public function next(checkMenuItemRequest $request)
    {
        try {
            $category = FoodCategory::select('*')->where('restaurant_id', $request->restaurant)->get();
            $data = [
                'category' => $category->toArray(),
                'menu_items' => $request->all(),
            ];

            return  redirect()->back()->with(['info' => 'you have time, 5 minutes  ', 'data' => $data]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
