<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =
            Category::query()
                ->latest()
                ->paginate(10);

        return response()->json($categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::query()->create($request->all());

        return response()->json(null,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $category->products()->paginate(10);

        return response()->json(['category' => $category, 'products' => $products], 200);
    }

    public function search(Request $request){
        $categories =
            Category::query()
                ->select("*")
                ->where('id', '=', $request->search)
                ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);

        return response()->json($categories, 200);
    }



    /**a
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 200);
    }
}
