<?php

namespace App\Http\Controllers;

use App\Collection_category;
use Illuminate\Http\Request;
use App\Category;
use App\Interior;

class HeadMenuController extends Controller
{
    public function head()
    {
        $data['categories'] = Category::where('parent_id', 0)->orderBy('id' , 'ASC')->get();
        $data['interiors'] = Interior::orderBy('id' , 'DESC')->get();
        $data['category_collections'] = Collection_category::orderBy('id' , 'DESC')->get();
        return view('menu.head')->with($data);
    }
}
