<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    public function description()
    {
        return $this->hasOne('App\Interior_description','int_id', 'id' )->where('language' , \App::getLocale());
    }
}
