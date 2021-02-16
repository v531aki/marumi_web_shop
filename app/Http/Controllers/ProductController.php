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
        if($request->category !== null){
            $products = DB::table('products')
                            ->join('product_category', 'products.id', '=', 'product_category.products_id')
                            ->join('categories', 'categories_id', '=', 'categories.id')
                            ->where('categories_id', $request->category)
                            ->paginate(16);
            $category = Category::find($request->category);
        } else {
            $products = Product::paginate(16);
            $category = null;
        }

        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('products.index', compact('products','categories', 'category', 'major_category_names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->width = $request->width;
        $product->moq = $request->moq;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->special_feature = $request->special_feature;
        if($request->restock){
            $product->restock = true;
        }else{
            $product->restock = false;
        }
        
        $product->save();
        
        if(isset($request->categories)){
            foreach($request->categories as $category){
                $product->categories()->attach($category);
            }
        }
        return view('products.index');
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
