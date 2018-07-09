<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    // тут виводемо header.blade
    public  function headerMenu() {
        return view('admin.header');
    }

    public  function sidebarMenu() {
        return view('admin.sidebar');
    }
}
