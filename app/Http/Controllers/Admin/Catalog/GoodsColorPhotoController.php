<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Goods;
use App\Goods_color_photo;
use App\Colors_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class GoodsColorPhotoController extends Controller
{
    public function index($id){
        $good = Goods::find($id);
        if(!$good)return 'Goods not exists';
        $data['photos'] = Goods_color_photo::where('good_id' , $id)->orderBy('id' , 'DESC')->paginate(20);
        $data['good'] = $good;
        $data['all_category'] = Colors_category::where('good_id' , $id)->orderby('id', 'ASC')->get();
        return view('admin.catalog.goods.colors.index')->with($data);
    }
    public function edit($id){
        $photo = Goods_color_photo::find($id);
        if(!$photo)return 'Photo not exists';
        $data['good'] = Goods::find($photo->good_id);
        $data['photo'] = $photo;
        $data['all_category'] = Colors_category::where('good_id' , $photo->good_id)->orderby('id', 'ASC')->get();
        return view('admin.catalog.goods.colors.edit')->with($data);
    }
    public function update(Request $request , $id){

        $new_collection = collect([]);
        if(count($request->select_color)){
            foreach ($request->select_color as $color){
                if($color != null)$new_collection->push($color);
            }
        }

        $photo = Goods_color_photo::find($id);
        $goods = Goods::findOrfail($photo->good_id);
        $path = public_path('files/image/catalog/' . $goods->subcategory_id . '/' . $goods->id.'/colors/photo');
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        if ($request->image) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        }
        $photo->attr = $new_collection;
        $photo->price = intval($request->price);
        if ($request->image  && $request->image->move($path, $imageName)) {
            File::Delete(public_path('/files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/colors/photo/'.$photo->file));
            $photo->file = $imageName;
        }
        $photo->save();
        return back();
    }
    public function delete($id){
        $photo = Goods_color_photo::find($id);
        if(!$photo)return 'no photo';
        $good = Goods::find($photo->good_id);
        File::Delete(public_path('/files/image/catalog/'.$good->subcategory_id.'/'.$good->id.'/colors/photo/'.$photo->file));
        $photo->delete();
        return back();
    }
}
