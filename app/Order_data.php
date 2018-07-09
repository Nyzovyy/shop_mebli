<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_data extends Model
{
    protected $table = 'order_data';
    
    public function good() {
        return $this->hasOne('App\Goods', 'id', 'good_id');
    }
    public function get_photo() {
        return $this->hasOne('App\Goods_color_photo', 'id', 'color_id');
    }
    public function color()
    {
        return $this->hasOne('App\Goods_color_photo','id', 'color_id');
    }

}
