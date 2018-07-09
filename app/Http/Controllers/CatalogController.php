<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getCategory(){

        return view('frontend.catalog.category.index');
    }

    public function getCollection($id){

        $data['goods'] = Goods::where('subcategory_id' ,$id)->paginate(30);
        $data['id'] = $id;

        return view('frontend.catalog.category.subcategory.index')->with($data);
    }
}
