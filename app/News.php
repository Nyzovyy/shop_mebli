<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function description()
    {
        return $this->hasOne('App\News_Descripton','news_id', 'id' )->where('language' , \App::getLocale());
    }
}
