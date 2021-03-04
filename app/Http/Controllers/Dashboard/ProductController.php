<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use App\Category;
use App\ProductCategory;
use App\Product_img;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

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

        $categories = ProductCategory::select('products_id', 'categories.name as name')
                            ->join('categories', 'categories_id', '=', 'categories.id')->get();

        $sort = [
            '価格の安い順' => 'price asc',
            '価格の高い順' => 'price desc',
            '出品の古い順' => 'updated_at asc',
            '出品の新しい順' => 'updated_at desc'
        ];

        return view('dashboard.products.index', compact('products', 'sort', 'sorted', 'total_count', 'keyword', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('dashboard.products.create', compact('categories', 'major_category_names'));
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
        $product->img = "test";
        $product->save();
        
        for($i = 0; $i < count($request->categories); $i++){
            $category = new ProductCategory();
            $category->products_id = $product->id;
            $category->categories_id = $request->categories[$i];
            $category->save();
        }

        return redirect()->route('dashboard.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories_id = ProductCategory::where('products_id', $product->id)->select('categories_id')->get()->toArray();
        foreach($categories_id as $categories){
            $category_id[] = $categories['categories_id'];
        }

        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('dashboard.products.edit', compact('product', 'categories', 'major_category_names', 'category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->width = $request->input('width');
        $product->moq = $request->input('moq');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->special_feature = $request->input('special_feature');
        $product->restock = $request->input('restock');
        $product->update();
        
        // $image = Product_img::where('products_id', $product->id)->select('id')->get();
        // Product_img::destroy($image);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $path = Storage::disk('s3')->put('/', $image, 'public'); // Ｓ３にアップ

            $product_img = new Product_img();
            $product_img->product_id = $product->id;
            $product_img->img_name = Storage::disk('s3')->url($path);

            $product_img->save();
        }
        

        $category = ProductCategory::where('products_id', $product->id)->select('id')->get();

        ProductCategory::destroy($category);

        foreach($request->category_ids as $category_id){
            $category = new ProductCategory();
            $category->products_id = $product->id;
            $category->categories_id = $category_id;
            $category->save();
        }

        return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index');
    }
    
    public function import(Product $product)
    {
        return view('dashboard.products.import');
    }
    
    public function import_csv(Request $request)
    {
        if ($request->hasFile('csv')) {
            Excel::import(new ProductsImport, $request->file('csv'));
            return redirect()->route('dashboard.products.import')->with('flash_message', 'CSVでの一括登録が成功しました!');
        }
        return redirect()->route('dashboard.products.import')->with('flash_message', 'CSVが追加されていません。CSVを追加してください。');
    }
}
