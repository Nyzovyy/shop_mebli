<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods_color extends Model
{
    public function goods()
    {
        return $this->hasOne('App\Goods' , 'id', 'good_id' );
    }
    public function color_category()
    {
        return $this->hasOne('App\Colors_category', 'id', 'category_id' );
    }
}
