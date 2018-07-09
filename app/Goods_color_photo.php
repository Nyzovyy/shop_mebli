<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods_color_photo extends Model
{
    protected $table = 'goods_colors_photos';

    protected $casts = [
        'file' => 'array'
    ];
}
