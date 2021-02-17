<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use App\Category;
use App\ProductCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_query = [];
        $sorted = "";

        if ($request->sort !== null){
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
        }

        if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            $total_count = Product::where('name', 'like', "%{$keyword}%")->orwhere('id', "{$keyword}")->count();
            $products = Product::where('name', 'like', "%{$keyword}%")->orwhere('id', "{$keyword}")->sortable($sort_query)->paginate(15);
        } else {
            $keyword = "";
            $total_count = Product::count();
            $products = Product::paginate(15);
        }

        $sort = [
            '価格の安い順' => 'price asc',
            '価格の高い順' => 'price desc',
            '出品の古い順' => 'updated_at asc',
            '出品の新しい順' => 'updated_at desc'
        ];

        return view('dashboard.products.index', compact('products', 'sort', 'sorted', 'total_count', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.products.create', compact('categories'));
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
        $product->name = $request->input('name');
        $product->width = $request->input('width');
        $product->moq = $request->input('moq');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->special_feature = $request->input('special_feature');
        $product->restock = $request->input('restock');
        $product->save();
        
        foreach($request->category as $category){
            $category = new ProductCategory();
            $category->products_id = $product->id;
            $category->categories_id = $category;
            $category->save();
        }

        
        return redirect()->route('dashboard.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
