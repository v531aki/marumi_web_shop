<?php

namespace App\Http\Controllers;

use App\Sewpad;
use App\Product;
use App\Category;
use App\Ranking;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SewpadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankings = Ranking::select('rankings.id as id','products.id as product_id', 'products.name','products.top_img', 'products.price')
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
        return view('sewpad.index',compact('categories', 'major_category_names', 'products_count', 'rankings', 'carts', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sowpad  $sowpad
     * @return \Illuminate\Http\Response
     */
    public function show(sowpad $sowpad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sowpad  $sowpad
     * @return \Illuminate\Http\Response
     */
    public function edit(sowpad $sowpad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sowpad  $sowpad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sowpad $sowpad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sowpad  $sowpad
     * @return \Illuminate\Http\Response
     */
    public function destroy(sowpad $sowpad)
    {
        //
    }
}
