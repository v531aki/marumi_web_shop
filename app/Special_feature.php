<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special_feature extends Model
{
    public function Products()
    {
        return $this->belongsToMany('APP\Product');
    }
}
