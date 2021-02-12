<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('web.index', compact('products', 'categories', 'major_category_names'));
    }
}
