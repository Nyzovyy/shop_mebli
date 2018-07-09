<?php

namespace App\Http\Controllers\Admin;

use App\Order_data;
use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        if(isset($_GET['order']) && $_GET['order'] > 0){
            $data['orders'] = Orders::where('status', intval($_GET['order']))->orderBy('id' , 'DESC')->paginate(20);
        }else{
            $data['orders'] = Orders::orderBy('id' , 'DESC')->paginate(20);
        }

        return view('admin.order.index')->with($data);
    }
    public function view($id){
        $order = Orders::find($id);
        if($order){
            $data['orders'] = Order_data::where('order_id' , $id)->get();
        }
        $data['data_order'] = $order;
        return view('admin.order.view')->with($data);
        return $order;
    }
    public function status($id , $status){
        $order = Orders::find($id);
        if($order){
            $order->status = $status;
        $order->save();
        }
    }
}
