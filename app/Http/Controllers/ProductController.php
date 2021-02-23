<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $products_count = Product::count();
        if($request->category !== null){
            $products = Product::join('product_category', 'products.id', '=', 'product_category.products_id')
                            ->join('categories', 'product_category.categories_id', '=', 'categories.id')
                            ->where('categories_id', $request->category)
                            ->paginate(16);
            $category = Category::find($request->category);
        } else {
            $products = Product::paginate(16);
            $category = null;
        }

        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('products.index', compact('products','categories', 'category', 'major_category_names', 'products_count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::all();
        
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('products.show', compact('products', 'categories', 'major_category_names'));
    }

}
