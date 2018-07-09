<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Goods_color_photo;
use Illuminate\Http\Request;
use App\Goods_description;
use App\Goods;
use App\Category;
use App\Category_description;

class UrlController extends Controller
{
    public function index($slug)
    {
        $goods_descr = Goods_description::where('slug', $slug)->first();
        if($goods_descr)
        {
            $goods = Goods::find($goods_descr->good_id);
            if($goods)
            {
                $data['suggests'] = Goods::where('subcategory_id' , $goods->subcategory_id)->inRandomOrder()->take(6)->get();
                $data['goods'] = $goods;
                $data['allPhotos'] = $goods->color_photo;
                return view('goods.view')->with($data);
            }
        }

        $cat_descr = Category_description::where('slug', $slug)->first();
        if($cat_descr)
        {

            $category =  Category::find($cat_descr->category_id);
            if(count($category->children))

            {
                //////////виводимо категорії
                $data['category'] = $category;
                $categories =  Category::where('parent_id' , $cat_descr->category_id)->get();
                $data['categories_all']  =  Category::where('parent_id' , 0)->get();
                $data['categories'] = $categories;


                return view('category.view')->with($data);
            }else{
                //////////виводимо товари в категорії
                $data['goods'] =  Goods::where('subcategory_id' , $cat_descr->category_id)->get();
                $data['category'] = $cat_descr;
                return view('category.goods')->with($data);

            }
        }
        //////////////////////////////////////////////////////////////
        $collection = Collection::where('slug', $slug)->first();
        if($collection)
        {
            $data['collection'] = $collection;
            return view('collection.index')->with($data);
        }
    }
}