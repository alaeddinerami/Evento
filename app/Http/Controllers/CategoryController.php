<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view("dashboard.categories.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);

        $validationData = $request->validate([
            'category' => "required"
        ]);
        $actor = Category::create(
            [
                "name"=> $validationData["category"],
            ]
        );

        // $image = $this->storeImg($request->file('image'), $actor);
        return redirect()->back()->with([
            'message' => 'category created successfully!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validationData = $request->validate([
            'name'=> 'required'
        ]);

        $category->update($validationData);

        return redirect()->back()->with([
            'message' => 'category updated successfully!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->Delete();
     
        return redirect()->back()->with([
            'message' => 'category deleted successfully!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);
    }
}
