<?php

namespace App\Http\Controllers;

use App\Card;
use App\Goods;
use App\Goods_color_photo;
use App\Order_data;
use App\Orders;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class CartController extends Controller
{
    public function getAddToCart($id , $photo_id){

        if(\Auth::check()){
            $user_id = \Auth::id();
        }else{
            $user_id = Cookie::get('card');
            if(!$user_id){
                $cookies = 'guest_'.time().rand(1,100);
                Cookie::queue('card', $cookies, 518400);
            }

        }
        $card = new Card;
        $card->user_id = $user_id;
        $card->good_id = $id;
        $card->color_id = $photo_id;
        $card->save();
        return redirect('/');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reducereduceByOne($id);
        Session::put('cart', $cart);

        return redirect('/');
    }

    public function getCartMini(){
        if(\Auth::guest()){
            $card = Cookie::get('card');
            if($card)$user_id = $card;
            else $card = null;
        }else{
            $user_id = \Auth::id();
        }
        if(isset($user_id))
        $count_card = Card::where('user_id' , $user_id)->paginate(30);
        else
            $count_card = null;
            return view('frontend._cartMini', ['cards' => $count_card]);
    }

    public function getCart(){
        if(\Auth::guest()){
            $card = Cookie::get('card');
            if($card)$user_id = $card;
            else $card = null;
        }else{
            $user_id = \Auth::id();
        }
        if(isset($user_id))
        $count_card = Card::where('user_id' , $user_id)->get();
        else
            $count_card = null;
        $totalPrice = 0;
        if(count($count_card)){
            foreach ($count_card as $cart){
                if($cart->color_id > 0 && $cart->get_photo->price > 0)
                    $price = $cart->get_photo->price * $cart->count;
                else
                    $price = $cart->good->price * $cart->count;

                $totalPrice +=$price;
            }
        }

        return view('shop.cart', ['cards' => $count_card , 'totalPrice' => $totalPrice]);
    }

    public function getCheckout(){
        if (!Session::has('cart')){
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
    public function postDeleteItems($id){
        if(\Auth::guest()){
            $card = Cookie::get('card');
            if($card)$user_id = $card;
            else $card = null;
        }else{
            $user_id = \Auth::id();
        }
        $data = Card::where('user_id' , $user_id)->where('id' , $id)->first();
        $data->delete();
    }
    public function setquantity(Request $request , $id){
        $q = $request->q;

        $cart = Card::find($id);
        if($cart && $q > 0 && $q < 100){
            $cart->count = $q;
            $cart->save();
        }

}
    public function buy(){
        $data = Card::where('user_id' , \Auth::id())->get();
        if($data){
            $count_card = $data;
            $totalPrice = 0;
            foreach ($count_card as $cart){
                if($cart->color_id > 0 && $cart->get_photo->price > 0)
                    $price = $cart->get_photo->price * $cart->count;
                else
                    $price = $cart->good->price * $cart->count;

                $totalPrice +=$price;
            }
            $order = new Orders;
            $order->user_id = \Auth::id();
            $order->totalPrice = $totalPrice;
            if($order->save()){
                if(count($data)) {
                    foreach ($data as $product){
                        $order_data = new Order_data;
                        $order_data->user_id = \Auth::id();
                        $order_data->order_id = $order->id;
                        $order_data->good_id = $product->good_id;
                        $order_data->color_id = $product->color_id;
                        $order_data->count = $product->count;
                        $order_data->save();
                    }
                }
                Card::where('user_id' , \Auth::id())->delete();
            }
            return redirect('/customer/orders')->with('message', '');

        }
    }

}
