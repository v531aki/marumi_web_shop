<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Ranking;
use App\Special_feature;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        
        $major_category_names = Category::pluck('major_category_name')->unique();
        
        $special_features = Special_feature::where('start_at', '<=', NOW())
                                            ->where('finished_at', '>', NOW())
                                            ->get();
        
        $rankings = Ranking::select('rankings.id as id','products.id as product_id', 'products.name', 'products.price')
                            ->join('products', 'rankings.product_id', '=', 'products.id')->get();
        
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

        return view('web.index', compact('products', 'categories', 'major_category_names', 'special_features', 'rankings', 'carts', 'total'));
    }
}
