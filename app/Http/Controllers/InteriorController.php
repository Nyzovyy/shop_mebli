<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interior;
use App\Collection;

class InteriorController extends Controller
{
    public function index()
    {
        $data['interiors'] = Interior::orderBy('id' , 'DESC')->get();
      //  $data['collections'] = Collection::orderBy('id' , 'DESC')->get();
        return view('interior.index')->with($data);
    }
}
