<?php

namespace App\Http\Controllers\Dashboard;

use App\Ranking;
use App\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankings = Ranking::select('rankings.id as id','products.id as product_id', 'products.name')
                            ->join('products', 'rankings.product_id', '=', 'products.id')->get();

        return view('dashboard.rankings.index', compact('rankings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Ranking $ranking)
    {
        $sort_query = [];
        $sorted = "";

        if ($request->sort !== null){
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
        }

        $rankings = Ranking::select('product_id')->get();

        if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            $total_count = Product::where('name', 'like', "%{$keyword}%")->orwhere('id', "{$keyword}")
                                    ->count();
            $products = Product::where('name', 'like', "%{$keyword}%")->orwhere('id', "{$keyword}")
                                ->where('id', '<>', $rankings[0]->product_id)
                                ->where('id', '<>', $rankings[1]->product_id)
                                ->where('id', '<>', $rankings[2]->product_id)
                                ->where('id', '<>', $rankings[3]->product_id)
                                ->where('id', '<>', $rankings[4]->product_id)
                                ->sortable($sort_query)->paginate(15);
        } else {
            $keyword = "";
            $total_count = Product::count();
            $products = Product::where('id', '<>', $rankings[0]->product_id)
                                ->where('id', '<>', $rankings[1]->product_id)
                                ->where('id', '<>', $rankings[2]->product_id)
                                ->where('id', '<>', $rankings[3]->product_id)
                                ->where('id', '<>', $rankings[4]->product_id)
                                ->paginate(15);
        }
        $total_count -= 5;

        $sort = [
            '価格の安い順' => 'price asc',
            '価格の高い順' => 'price desc',
            '出品の古い順' => 'updated_at asc',
            '出品の新しい順' => 'updated_at desc'
        ];

        return view('dashboard.rankings.edit', compact('products', 'sort', 'sorted', 'total_count', 'keyword', 'categories', 'ranking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ranking $ranking)
    {
        $ranking->product_id = $request->input('product_id');
        $ranking->update();

        return redirect()->route('dashboard.ranking');
    }
}
