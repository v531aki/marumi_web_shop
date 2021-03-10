<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Ranking;
use App\Product_img;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $common;

    public function __construct(CommonController $common)
    {
        $this->common = $common;
    }

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
        } elseif($request->new_products){
            $products_count = Product::all()->count();
            $products = Product::select('name', 'price', 'top_img')->orderBy('updated_at', 'desc')->paginate(16);

            $sort_type = "新しい順";
        } else {
            $products_count = Product::all()->count();
            $products = Product::select('products.id as id', 'name', 'price', 'top_img')
                                ->paginate(16);
            $sort_type = null;
        }

        $sidebar = $this->common->sidebar();

        return view('products.index', compact('products', 'sort_type', 'products_count', 'sidebar'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $img = Product_img::select('img_name')->where('product_id', $product->id)->get()->toArray();
        foreach($img as $i){$imgs[] = $i['img_name'];}

        $sidebar = $this->common->sidebar();


        return view('products.show', compact('product', 'sidebar', 'imgs'));
    }

}
