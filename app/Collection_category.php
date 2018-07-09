<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection_category extends Model
{
    protected $table = 'collection_category';

    public function collections()
    {
        return $this->hasMany('App\Collection', 'category_id' , 'id' );
    }
}
