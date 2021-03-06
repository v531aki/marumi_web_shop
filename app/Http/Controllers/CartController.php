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
    public function index()
    {
        $sidebar = $this->common->sidebar();
        return view('carts.index', compact('sidebar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::instance(Auth::user()->id)->content();

        $flag = true;
        foreach($cart as $c){
            if($c->id == $request->id){
                if($c->qty + $request->qty > $request->stock){
                    $flag = false;
                }
            } 
        }
        if($flag){
            Cart::instance(Auth::user()->id)->add(
                [
                    'id' => $request->id, 
                    'name' => $request->name, 
                    'qty' => $request->qty, 
                    'price' => $request->price, 
                    'weight' => $request->weight, 
                    'options' => ['img'=> $request->img]
                ] 
            );
            $msg = "カートに追加しました！";
        }else{
            $msg = "在庫数量を超過しています！";
        }

        return redirect()->route('products.show', $request->get('id'))->with('msg', $msg);
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
