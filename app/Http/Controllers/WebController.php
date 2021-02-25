<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Special_feature;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        
        $major_category_names = Category::pluck('major_category_name')->unique();
        
        $special_features = Special_feature::whereColumn('start_at', '<=', NOW())
                                            ->whereColumn('finished_at', '>', NOW())
                                            ->get();

        return view('web.index', compact('products', 'categories', 'major_category_names', 'special_features'));
    }
}
