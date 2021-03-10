<?php

namespace App\Http\Controllers;

use App\Ranking;
use App\Category;
use Carbon\Carbon;
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

        $common['dates1'] = $this->getCalendarDates(date('Y'),date('m'));
        $common['dates2'] = $this->getCalendarDates(date('Y', strtotime('+1 month')), date('m', strtotime('+1 month')));

        return $common;
    }
    public function getCalendarDates($year, $month)
    {
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }
        return $dates;
    }
}
