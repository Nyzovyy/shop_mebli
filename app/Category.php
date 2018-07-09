<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    const CATEGORY_ACTIVE = 0;
    const CATEGORY_UNACTIVE = 1;

    /**
     * Get the comments for the blog post.
     */

    public function parent() {

        return $this->hasOne('App\Category', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Category', 'parent_id', 'id');

    }

    public function goods() {

        return $this->hasOne('App\Goods', 'id', 'subcategory_id');

    }
    public function description()
    {
        return $this->hasOne('App\Category_description','category_id', 'id' )->where('language' , \App::getLocale());
    }
}
