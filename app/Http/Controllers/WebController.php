<?php

namespace App\Http\Controllers;

use App\Product;
use App\Special_feature;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebController extends Controller
{
    protected $common;

    public function __construct(CommonController $common)
    {
        $this->common = $common;
    }
    public function index()
    {
        $sidebar = $this->common->sidebar();

        $products = Product::select('id', 'name', 'price', 'top_img')->orderBy('updated_at', 'desc')->take(4)->get();
        
        $special_features = Special_feature::where('start_at', '<=', NOW())
                                            ->where('finished_at', '>', NOW())
                                            ->get();

        return view('web.index', compact('products', 'special_features', 'sidebar'));
    }
}
