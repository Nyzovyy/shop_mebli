<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index(){


        $data['goods'] = Goods::get();

        return view('frontend.index')->with($data);
    }

}
