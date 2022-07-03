<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodCategoryRequest;
use App\Http\Requests\UpdateFoodCategoryRequest;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Laravel\Sanctum\HasApiTokens;

class FoodCategoryController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
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
     * Display the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function showAll(FoodCategory $foodCategory, $id)
    {
        try {


            $foodCategories = FoodCategory::where('restaurant_id', $id)->paginate(5);
            $restaurant = Restaurant::find($id);
            $trash = FoodCategory::onlyTrashed()->where('restaurant_id', $id)->get();
            $data = [
                'foodCategories' => $foodCategories,
                'restaurant' => $restaurant,
                'trash' => $trash,
            ];
            // return response()->json($data);
            return view('dashboard.food-category.show-all', compact('data'));
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodCategory $foodCategory)
    {
        // $restaurants = Restaurant::where('user_id', auth()->user()->id)->get();
        $foodCategory = FoodCategory::select('*')->where('id', request()->id)->get();

        $data = [
            // 'restaurants' => $restaurants,
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
            $message = !request()->status ? 'Food Category activated successfully' : 'Food Category deactivated successfully';
            return redirect()->back()->with('message', $message);
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
        //soft-delete
        try {
            $foodCategory::where('id', request()->id)->update([
                'is_active' => false
            ]);
            $foodCategory::where('id', request()->id)->delete();
            return redirect()->back()->with('message', 'Food Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function trash(FoodCategory $foodCategory)
    {
        try {
            $trash = $foodCategory->onlyTrashed()->where('restaurant_id', request()->id)->paginate(5);
            $data = [
                'trashed' => $trash,
            ];

            return view('dashboard.food-category.trash', compact('data'));
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
        }
    }
    public function restore(FoodCategory $foodCategory)
    {

        try {
            $foodCategory::where('id', request()->id)->restore();
            return redirect()->back()->with('message', 'Food Category restored successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function forceDelete(FoodCategory $foodCategory)
    {
        try {
            $foodCategory::where('id', request()->id)->forceDelete();
            return redirect()->back()->with('warning', 'Food Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
