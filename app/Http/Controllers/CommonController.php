<?php

namespace App\Http\Controllers;

use App\Ranking;
use App\Category;
use App\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommonController
{
    public function sidebar()
    {
        $common['categories'] = Category::all();
        
        $common['major_category_names'] = Category::pluck('major_category_name')->unique();
        
        $common['rankings'] = Ranking::select('rankings.id as id','products.id as product_id', 'products.name','products.top_img', 'products.price')
                            ->join('products', 'rankings.product_id', '=', 'products.id')->get();
        
        $common['carts'] = [];
        $common['total'] = 0;
        if( Auth::check() ){
            $common['carts'] = Cart::instance(Auth::user()->id)->content();
            $total = 0;

            foreach($common['carts'] as $c){
                $common['total'] += $c->qty * $c->price;
            }
        }

        return $common;
    }
}
