<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection_data extends Model
{
    protected $table = 'collection_content_data';

    public function content()
    {
        return $this->hasOne('App\Collection_content', 'id', 'id_slider' );
    }
}
