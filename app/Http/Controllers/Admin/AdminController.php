<?php

namespace App\Http\Controllers\admin;

use App\Goods;
use App\Models\ShoppingCart\Order;
use App\User;
use Illuminate\Http\Request;
use App\Orders;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $data['users'] = User::count();
        $data['orders'] = Orders::where('status', 0)->count();
        $data['pay_orders'] = Orders::where('status', 2)->count();
        $data['count_goods'] = Goods::count();

        return view('admin.index')->with($data);
    }

    public function users()
    {
        $user = User::orderBy('id' , 'DESC')->paginate(20);
        if ($user) {
            $data['users'] = $user;
            return view('admin.users.view')->with($data);
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back();
    }

    public function status($id){
        $user = User::find($id);
        if ($user && $user->is_admin == 0){

            if($user->ban == 0)
            {
                $user->ban = 1;
            }else{
                $user->ban = 0;
            }
            $user->save();
        }
        return back();
    }

    public function profile($id)
    {
        $user = User::find($id);
        if ($user) {
            $data['user'] = $user;
            return view('admin.users.profile')->with($data);
        }
    }
}
