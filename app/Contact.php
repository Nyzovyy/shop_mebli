<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    public function description()
    {
        return $this->hasOne('App\Contact_description','contact_id', 'id' )->where('language' , \App::getLocale());
    }

    public function description_ua()
    {
        return $this->hasOne('App\Contact_description','contact_id', 'id' )->where('language' , 'ua');
    }
    public function description_ru()
    {
        return $this->hasOne('App\Contact_description','contact_id', 'id' )->where('language' , 'ru');
    }
}
