<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{

    // Display a listing of the resource.
    // public function index()
    // {
    //     return response()->json(Category::all());
    // }


    //    Display a listing of the resource with optional search.

    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        return response()->json($query->get());
    }





    //Store a newly created resource in storage.

public function store(CreateCategoryRequest $request)    {
        //dd($request->validated()) ;


        $category = Category::create( $request->validated());

        return response()->json($category, 201);
    }

    //Display the specified resource.

    // public function show(Category $category)
    // {
    //     return response()->json($category);
    // }


     public function show($id)
     {
        return new CategoryResource( $category = Category::find($id) );
     }



    //Update the specified resource in storage.
    //update your update() method.

   public function update(UpdateCategoryRequest $request, Category $category)
{
    $category->update($request->validated());
    return response()->json($category);
}


    //Remove the specified resource from storage.
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
