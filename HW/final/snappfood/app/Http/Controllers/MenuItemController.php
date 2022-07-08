<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkMenuItemRequest;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\FoodCategory;
use App\Models\MenuItem;
use App\Models\Offer;
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

        $foodCategories = Restaurant::select('*')->with('foodCategories')->where('user_id', auth()->user()->id)->paginate(5);

        $data = [
            'menuItems' => $foodCategories,
        ];

        // return response()->json($data);

        return view('dashboard.menu-item.index', compact('data'));
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
            $menuItem->create(
                [
                    'item_name' => $request->name,
                    'description' =>  $request->description,
                    'price' => $request->price,
                    'restaurant_id' => $request->restaurant,
                    'food_category_id' => $request->category,
                    'user_id' => auth()->user()->id,
                    'is_active' => false,

                ]

            )->save();


            return redirect()->back()->with('message', 'Menu Item Created Successfully');
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
        $menuItem = MenuItem::select('*')
            ->where('restaurant_id', request()->restaurant)
            ->where('food_category_id', request()->category)
            ->paginate(5);

        $offers = Offer::all();
        $data = [
            'menuItems' => $menuItem,
            'offers' => $offers,
        ];


        return view('dashboard.menu-item.show', compact('data'));
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

            return  redirect()->back()->with(['info' => 'you have time, 5 minutes', 'data' => $data]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function setPivot()
    {
        // TODO :not fund this route
        try {
            $offer = Offer::find(request()->offer);
            $offer->menuItems()->sync(request()->menu);
            // return redirect()->back()->with('info', 'Offer set to pivot successfully');
        } catch (\Throwable $th) {
            // return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
