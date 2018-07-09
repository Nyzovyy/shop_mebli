<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors_category extends Model
{
    protected $table = 'goods_colors_category';

    public function goods()
    {
        return $this->hasOne('App\Goods' , 'id', 'good_id' );
    }

    public function colors()
    {
        return $this->hasMany('App\Goods_color','category_id', 'id' )->orderBy('id' , 'ASC');
    }
    
}
