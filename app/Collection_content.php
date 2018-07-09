<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection_content extends Model
{
    public function data()
    {
        return $this->hasMany('App\Collection_data', 'id_slider', 'id' );
    }
    public function dataOne()
    {
        return $this->hasOne('App\Collection_data', 'id_slider', 'id' );
    }
}
