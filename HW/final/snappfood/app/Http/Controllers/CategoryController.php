<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Client\Request;
use View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select all category
        $categories = Category::select('*')->paginate(5);

        $data = [
            'categories' => $categories,
            'trash' => Category::onlyTrashed()->count(),
        ];
        return view('dashboard.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        try {
            $category->create([
                'category_name' => $request->category_name,
                'user_id' =>  auth()->user()->id
            ]);
            return redirect()->back()->with('message', 'Category created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Category created failed' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        try {
            $category->where('id', $request->id)->update([
                'is_active' => !$request->status,
            ]);
            $message = !request()->status ? 'Food Category activated successfully' : 'Food Category deactivated successfully';
            return redirect()->back()->with('message', $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }



    //soft delete

    public function softDelete(Category $category)
    {

        $category->find(request()->id)->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    //restore soft deleted

    public function restore(Category $category)
    {
        $category->onlyTrashed()->find(request('id'))->restore();

        return redirect()->back()->with('message', 'Category restored successfully');
    }

    //force delete

    public function forceDelete(Category $category)
    {
        $category->forceDelete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    //trash category

    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        $data = [
            'trashed' => $categories,
        ];
        return view('dashboard.category.trash', compact('data'));
    }
}
