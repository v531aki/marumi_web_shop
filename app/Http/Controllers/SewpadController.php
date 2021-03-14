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
        
        return view('sewpad.index',compact('sidebar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sidebar = $this->common->sidebar();
        
        return view('sewpad.create',compact('sidebar'));
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
     * @param  \App\sewpad  $sewpad
     * @return \Illuminate\Http\Response
     */
    public function show(sewpad $sewpad)
    {
        $sidebar = $this->common->sidebar();

        return view('sewpad.show', compact('sidebar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sewpad  $sewpad
     * @return \Illuminate\Http\Response
     */
    public function edit(sewpad $sewpad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sewpad  $sewpad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sewpad $sewpad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sewpad  $sewpad
     * @return \Illuminate\Http\Response
     */
    public function destroy(sewpad $sewpad)
    {
        //
    }
}
