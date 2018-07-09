<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function data() {
        return $this->hasOne('App\Goods', 'order_id', 'id');
    }
    public function user()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }
    public function data_user()
    {
        return $this->hasOne('App\UserData','user_id', 'user_id' );
    }
    public function data_company()
    {
        return $this->hasOne('App\UserInvoiceData','user_id', 'user_id' );
    }
    
}
