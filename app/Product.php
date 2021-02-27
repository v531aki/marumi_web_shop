<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function special_features()
    {
        return $this->belongsToMany('App\Special_feature');
    }

    public function rankings()
    {
        return $this->belongsTo('App\Ranking');
    }
}
