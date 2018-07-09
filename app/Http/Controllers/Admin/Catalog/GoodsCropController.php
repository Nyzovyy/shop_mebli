<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Goods_color_photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Goods_color;
use App\Colors_category;
use Image;
use File;

class GoodsCropController extends Controller
{
    public function index($id , $img)
    {
        $goods = Goods::find($id);

        if(!$goods)return 'Файл не знайденно';

        $url_img = '/files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/original/'.$img;

        $data['goods'] = $goods;
        $data['file'] = $url_img;
        $data['id'] = $id;
        $data['origin_img'] = $img;
        $data['category_colors'] = Colors_category::where('good_id' , $id)->orderBy('id' , 'DESC')->get();
        return view('admin.catalog.goods.crop')->with($data);
    }
    public function save(Request $request , $id)
    {
        $origin_img = $request->origin;
        $goods = Goods::find($id);
        if($goods)
        {
            $path_colors = public_path('files/image/catalog/' . $goods->subcategory_id .'/'.$goods->id.'/colors');
            if (!File::exists($path_colors)) {
                File::makeDirectory($path_colors, $mode = 0777, true, true);
            }
            //get the base-64 from data
            $base64_str = substr($request->img, strpos($request->img, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);

            $png_url = time().'_'.$origin_img;
            $path = public_path('files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/colors/' . $png_url);
            Image::make(file_get_contents($request->img))->save($path);

            $color_new = new Goods_color;
            $color_new->category_id = $request->category_color;
            $color_new->name_ru = $request->name_ru;
            $color_new->name_ua = $request->name_ua;
            $color_new->img = $origin_img;
            $color_new->file = $png_url;
            $color_new->save();

 
        }


        return 'success';
    }
    public function edit($id)
    {
        $color = Goods_color::find($id);
        if(!$color)
        {
            return 'Колір не знайдено';
        }
        $data['color'] = $color;
        return view('admin.catalog.goods.crop_edit')->with($data);
    }
    public function editPost(Request $request)
    {
        $color =  Goods_color::find($request->id);
        if($color){
            $goods = Goods::find($color->color_category->goods->id);
            $path = public_path('files/image/catalog/' . $goods->subcategory_id . '/' . $goods->id.'/colors');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            if ($request->photo) {
                $imageName = 'original-color-'.time() . '.' . $request->photo->getClientOriginalExtension();
            }
            $color->name_ru = $request->name_ru;
            $color->name_ua = $request->name_ua;
            if ($request->photo &&  $request->photo->move($path, $imageName)){
                $img = Image::make($path.'/'.$imageName);
                $img->fit(64, 64, null, 'top');
                $img->save($path.'/'.$imageName);
                $color->file = $imageName;
            }
                $color->save();
            return 'success';
        }
        
    }
    public function delete($id)
    {
        $color =  Goods_color::findOrfail($id);
        
        if($color)
        {

            File::Delete(public_path('files/image/catalog/'.$color->color_category->id.'/'.$color->color_category->good_id.'/colors/'.$color->file));
            $color->delete();
            return back();
        }
    }
    public function modalColorNewCategory($id)
    {
        $goods =  Goods::findOrfail($id);
        if($goods) {
            $data['goods'] = $goods;
            return view('admin.catalog.goods.modal_create_category_color')->with($data);
        }
    }
    public function modalColorNewCategoryPost(Request $request , $id)
    {
        $color_new = new Colors_category;
        $color_new->good_id = $id;
        $color_new->name_ru = $request->name_ru_color;
        $color_new->name_ua = $request->name_ua_color;
        $color_new->save();
        return 'success';
    }
    public function modalColor($id)
    {

            $data['id_category'] = $id;
        $category = Colors_category::find($id);
            $product = Goods::find($category->good_id);
            $data['all_category'] = Colors_category::where('good_id' , $product->id)->orderby('id', 'ASC')->get();
            return view('admin.catalog.goods.modal_upload_color')->with($data);
        
    }
    public function modalColorPost(Request $request , $id)
    {
        $this->validate($request, [
            'image_color_pictures' => 'required|mimes:jpeg,bmp,png,gif,svg'
        ]);

        $category = Colors_category::findOrfail($id);

        $goods = Goods::findOrfail($category->good_id);
        if ($goods) {
            $path = public_path('files/image/catalog/' . $goods->subcategory_id . '/' . $goods->id.'/colors');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            if ($request->image_color_pictures) {
                $imageName_color = 'original-color-'.time() . '.' . $request->image_color_pictures->getClientOriginalExtension();
            }
            if ($request->image_color_pictures &&  $request->image_color_pictures->move($path, $imageName_color)) {
                $img = Image::make($path.'/'.$imageName_color);
                $img->fit(64, 64, null, 'top');
                $img->save($path.'/'.$imageName_color);

                $color_new = new Goods_color;
                $color_new->category_id = $id;
                $color_new->name_ru = $request->name_ru_color;
                $color_new->name_ua = $request->name_ua_color;
                $color_new->file = $imageName_color;
                $color_new->save();
                return 'success';
            }
        }
    }
    public function modalColorPhoto($id)
    {

        $data['id_category'] = $id;
        $category = Colors_category::find($id);
        $product = Goods::find($category->good_id);
        $data['all_category'] = Colors_category::where('good_id' , $id)->orderby('id', 'ASC')->get();
        return view('admin.catalog.goods.modal_upload_color_photo')->with($data);

    }
    public function modalColorPostPhoto(Request $request , $id)
    {
        $new_collection = collect([]);
        if(count($request->select_color)){
            foreach ($request->select_color as $color){
                if($color != null)$new_collection->push($color);
            }
        }
   // return $new_collection;
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,bmp,png,gif,svg'
        ]);



        $goods = Goods::findOrfail($id);
        if ($goods) {
            $path = public_path('files/image/catalog/' . $goods->subcategory_id . '/' . $goods->id.'/colors/photo');
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            if ($request->image) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            }

            if ($request->image  && $request->image->move($path, $imageName)) {

                $color_new = new Goods_color_photo;
                $color_new->good_id = $id;
                $color_new->file = $imageName;
                $color_new->attr = $new_collection;
                $color_new->price = intval($request->price);
                $color_new->save();

                return 'success';
            }
        }
    }
    public function returnArray(Request $request){
        $array_colors = $request->all();
        $search_array = '';

        foreach ($array_colors as $k => $v) {
            $search_array .= $k;
        }
        $new_array =  explode( ',', $search_array );
        $count_new_array = count($new_array);
        $new_collection = collect([]);

        if($count_new_array > 0){
            for ($i = 0 ; $i < $count_new_array; $i++){
                $new_collection->push($new_array[$i]);
            }
        }
       $color = Goods_color_photo::where('attr' , json_encode($new_collection))->first();
        if($color){
            $good = Goods::find($color->good_id);
            return collect(['success', '/files/image/catalog/'.$good->subcategory_id.'/'.$good->id.'/colors/photo/'.$color->file, $color->price , $color->id]);
        }
        else return collect(['error']);
    }
    public function deleteCategory($id){
        $category = Colors_category::find($id);
        if($category){
            Goods_color::where('category_id' , $id)->delete();
            $category->delete();
            return 'success';
        }
    }
    public function modalCategoryEdit($id)
    {

        $data['id_category'] = $id;
        $category = Colors_category::find($id);
        $data['category'] =$category;
        return view('admin.catalog.goods.modal_category_edit')->with($data);

    }
    public function modalCategoryEditPost($id , Request $request){
        $category = Colors_category::find($id);
        $category->name_ru = $request->name_ru;
        $category->name_ua = $request->name_ua;
        $category->save();
        return 'success';
    }
}
