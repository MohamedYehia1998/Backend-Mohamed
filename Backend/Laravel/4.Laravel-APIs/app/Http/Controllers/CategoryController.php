<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =
            Category::query()
            ->latest()
            ->paginate(10);

        return view('category.index',['categories' => $categories]);
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
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $category->products()->paginate(10);;
        return view('category.show', ['products' => $products, 'category' => $category]);

    }

    public function search(Request $request){
        $categories =
            Category::query()
            ->select("*")
            ->where('id', '=', $request->search)
            ->orWhere('name', 'LIKE', '%' . $request->search . '%')
            ->paginate(10);

        return view('category.index', ['categories' => $categories]);
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
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
