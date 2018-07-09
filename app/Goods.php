<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods';
    

    public function category() {

        return $this->belongsTo('App\Category', 'subcategory_id');

    }
    public function description()
    {
        return $this->hasOne('App\Goods_description','good_id', 'id' )->where('language' , \App::getLocale());
    }
    public function description_ua()
    {
        return $this->hasOne('App\Goods_description','good_id', 'id' )->where('language' , 'ua');
    }
    public function description_ru()
    {
        return $this->hasOne('App\Goods_description','good_id', 'id' )->where('language' , 'ru');
    }
    public function colors_category()
    {
        return $this->hasMany('App\Colors_category', 'good_id', 'id' );
    }
    public function color_photo()
    {
        return $this->hasOne('App\Goods_color_photo', 'good_id', 'id' )->orderBy('id' , 'DESC');
    }
    public function collection()
    {
        return $this->hasOne('App\Collection' , 'id' , 'collection_id');
    }
    
}
