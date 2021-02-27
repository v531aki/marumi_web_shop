<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Ranking;
use App\Special_feature;
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
        
        $rankings = Ranking::select('product_id')->get();
        
        for($i = 0; $i < 5; $i++){
            $ranker_product = Product::where('id', '=', $rankings[$i]['product_id'])->get();
            $ranker_products[] = $ranker_product[0];
        }

        return view('web.index', compact('products', 'categories', 'major_category_names', 'special_features', 'ranker_products'));
    }
}
