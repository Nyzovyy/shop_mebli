<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_description extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories_description';

    public function category() {

        return $this->hasOne('App\Category', 'id', 'category_id');

    }
}
