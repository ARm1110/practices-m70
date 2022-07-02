<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodCategoryRequest;
use App\Http\Requests\UpdateFoodCategoryRequest;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\View;

class FoodCategoryController extends Controller
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
            'foodCategories' => $foodCategories,
        ];


        return view('dashboard.food-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::with('category')->where('user_id', auth()->user()->id)->get();

        $data = [
            'restaurants' => $restaurants,
        ];

        return view('dashboard.food-category.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodCategoryRequest $request)
    {
        // dd($request->all());
        try {
            $foodCategory = new FoodCategory();
            $foodCategory->category_name = $request->name;
            $foodCategory->restaurant_id = $request->restaurant;
            $foodCategory->user_id = auth()->user()->id;
            $foodCategory->save();
            return redirect()->back()->with('message', 'Food Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodCategory $foodCategory)
    {
        $restaurants = Restaurant::where('user_id', auth()->user()->id)->get();
        $foodCategory = FoodCategory::select('*')->where('id', request()->id)->get();

        $data = [
            'restaurants' => $restaurants,
            'foodCategories' => $foodCategory,
        ];
        return view('dashboard.food-category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodCategoryRequest  $request
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
    {

        try {
            $foodCategory->where('id', $request->id)->update([
                'category_name' => $request->name,
                'category_id' => $request->category,
                'is_active' => false
            ]);

            return redirect()->back()->with('message', 'Food Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function updateStatus(FoodCategory $foodCategory)
    {
        try {
            $foodCategory::where('id', request()->id)->update(
                [
                    'is_active' => !request()->status,
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
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodCategory $foodCategory)
    {
        //
    }
}
