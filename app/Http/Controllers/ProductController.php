<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Ranking;
use APP\Product_img;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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
            $products_count = Product::join('product_category', 'products.id', '=', 'product_category.products_id')
                            ->where('categories_id', $request->category)->count();
            
            $products = Product::select('products.id as id', 'name', 'price', 'top_img')
                            ->join('product_category', 'products.id', '=', 'product_category.products_id')
                            ->where('categories_id', $request->category)
                            ->paginate(16);
                            
            $sort_type = Category::find($request->category);
            $sort_type = $sort_type->name;
        } elseif($request->special_feature_id !== null){
            $products_count = Product::where('special_feature', 'like', '%'.$request->special_feature_id.'%')->count();
            $products = Product::select('products.id as id', 'name', 'price', 'top_img')
                                ->where('special_feature', 'like', '%'.$request->special_feature_id.'%')->paginate(16);

            $sort_type = $request->special_feature_name;
        } else {
            $products_count = Product::all()->count();
            $products = Product::select('products.id as id', 'name', 'price', 'top_img')
                                ->paginate(16);
            $sort_type = null;
        }

        $rankings = Ranking::select('rankings.id as id','products.id as product_id', 'products.name', 'products.price')
                            ->join('products', 'rankings.product_id', '=', 'products.id')->get();

        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        if( Auth::check() ){
            $carts = Cart::instance(Auth::user()->id)->content();
            $total = 0;

            foreach($carts as $c){
                $total += $c->qty * $c->price;
            }
        }else{
            $carts = [];
            $total = 0;
        }

        return view('products.index', compact('products','categories', 'sort_type', 'major_category_names', 'products_count', 'rankings', 'carts', 'total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $rankings = Ranking::select('rankings.id as id','products.id as product_id', 'products.name', 'products.price')
                            ->join('products', 'rankings.product_id', '=', 'products.id')->get();

        $img = Product_img::select('img_name')->where('product_id', $product->id)->get()->toArray();
        foreach($img as $i){$imgs[] = $i['img_name'];}

        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        if( Auth::check() ){
            $carts = Cart::instance(Auth::user()->id)->content();
            $total = 0;

            foreach($carts as $c){
                $total += $c->qty * $c->price;
            }
        }else{
            $carts = [];
            $total = 0;
        }

        return view('products.show', compact('product', 'categories', 'major_category_names', 'rankings', 'carts', 'total', 'img'));
    }

}
