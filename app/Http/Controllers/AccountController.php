<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Card;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getCustomer(){
        $data['user'] = User::find(\Auth::id());
        return view('frontend.account.customer')->with($data);
    }

    public function getAddresses(){

        return view('frontend.account.addresses');
    }

    public function getOrders(){
        
        $data['orders'] = Orders::where('user_id' , \Auth::id())->orderBy('id' , 'DESC')->paginate(20);
        return view('frontend.account.orders')->with($data);
    }
}
