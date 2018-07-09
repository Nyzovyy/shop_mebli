<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function content()
    {
        return $this->hasMany('App\Collection_content', 'id_collection', 'id' );
    }
    public function products()
    {
        return $this->hasMany('App\Goods', 'collection_id', 'id' )->orderBy('id' , 'DESC');
    }
}
