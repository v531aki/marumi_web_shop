<?php

namespace App\Http\Controllers;

use App\Ranking;
use App\Category;
use App\Product;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::instance(Auth::user()->id)->content();
        $total = 0;

        foreach($cart as $c){
            $total += $c->qty * $c->price;
        }

        $rankings = Ranking::select('rankings.id as id','products.id as product_id', 'products.name', 'products.price')
                            ->join('products', 'rankings.product_id', '=', 'products.id')->get();

        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('carts.index', compact('cart', 'total', 'categories', 'major_category_names', 'rankings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::instance(Auth::user()->id)->add(
            [
                'id' => $request->id, 
                'name' => $request->name, 
                'qty' => $request->qty, 
                'price' => $request->price, 
                'weight' => $request->weight, 
            ] 
        );

        dd($request);

        return redirect()->route('products.show', $request->get('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = DB::table('shoppingcart')->where('instance', Auth::user()->id)->where('identifier', $count)->get();
        return view('carts.show', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->input('delete')) {
            Cart::instance(Auth::user()->id)->remove($request->input('id'));
        } else {
            Cart::instance(Auth::user()->id)->update($request->input('id'), $request->input('qty'));
        }
            
        return redirect()->route('carts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $user_shoppingcarts = DB::table('shoppingcart')->where('instance', Auth::user()->id)->get();

        $count = $user_shoppingcarts->count();

        $count += 1;
        Cart::instance(Auth::user()->id)->store;

        DB::table('shoppingcart')->where('instance', Auth::user()->id)->where('number', null)->update(['number' => $count, 'buy_flag' => true]);

        Cart::instance(Auth::user()->id)->destroy();

        return redirect()->route('carts.index');
    }
}
