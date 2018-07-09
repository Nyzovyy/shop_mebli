<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Category;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Goods;
use Validator;
use App\Goods_description;
use App\Category_description;
use File;
use Image;


class GoodsController extends Controller
{
    
    public function view($id)
    {

        //      передаємо в змінну $date моодель goods пагінація(paginate 30 на сторінку) -------------
        $data['goods'] = Goods::find($id);
        return view('admin.catalog.goods.view')->with($data); // передаємо масив goods у view;
    }

    public function create($id)
    {
        $category = Category::find($id);
        if ($category) {
            $data['category'] = $category;
            return view('admin.catalog.goods.create')->with($data); // передаємо масив goods у view;
        }

    }

    // Зберігання товару
    public function createPost(Request $request, $id)
    {

      //  return $request->all();

        $validator = Validator::make($request->all(), [
            'name_ru' => 'required|min:1|max:255',
            'name_ua' => 'required|min:1|max:255',
            'price' => 'required|min:1|max:255',
          //  'description_ua' => 'required',
          //  'description_ru' => 'required',
            'img' => 'mimes:jpeg,bmp,png,gif,svg',
           // 'width' => 'required',
           // 'depth' => 'required',
           // 'height' => 'required',
        ]);

        if ($validator->fails()) dd ($validator);

        
        $goods = new Goods();
        
        $goods->price = $request->price;
        if($request->width)
        $goods->width = $request->width;
        if($request->depth)
        $goods->depth = $request->depth;
        if($request->height)
        $goods->height = $request->height;
        $goods->subcategory_id = $id;
        $goods->save();

        $new_description = new Goods_description;
        $new_description->name = $request->name_ru;
        $new_description->language = 'ru';
        if($request->description_ru)
        $new_description->description = $request->description_ru;
        $new_description->good_id = $goods->id;
        $new_description->slug = $this->getSlug('product-'.$request->name_ru);
        $new_description->save();

        $new_description = new Goods_description;
        $new_description->name = $request->name_ua;
        $new_description->language = 'ua';
        if($request->description_ua)
            $new_description->description = $request->description_ua;
        $new_description->slug = $this->getSlug('product-'.$request->name_ua);
        $new_description->good_id = $goods->id;
        $new_description->save();

        $path = public_path('files/image/catalog/' . $id .'/'.$goods->id);

        if (!File::exists($path.'/mini'))File::makeDirectory($path.'/mini', $mode = 0777, true, true);
        if (!File::exists($path.'/preview'))File::makeDirectory($path.'/preview', $mode = 0777, true, true);
        if (!File::exists($path.'/card'))File::makeDirectory($path.'/card', $mode = 0777, true, true);
        if (!File::exists($path.'/original'))File::makeDirectory($path.'/original', $mode = 0777, true, true);
        if (!File::exists($path.'/cover'))File::makeDirectory($path.'/cover', $mode = 0777, true, true);


        if( isset($request->photos))
        {
            $img_array = '';
            $goods_update = Goods::find($goods->id);

            foreach ($request->photos as $photo) {
                $Name = rand(0,99999999).time().'.'.$photo->getClientOriginalExtension();

                if($photo && $photo->move($path.'/original', $Name))
                {
                    $img_array .='|'.$Name.'|';

                    $img = Image::make($path.'/original/'.$Name);
                    $img->fit(34, null, null, 'top');
                    $img->save($path.'/mini/'.$Name);

                    $img = Image::make($path.'/original/'.$Name);
                    $img->save($path.'/preview/'.$Name);

                    $img = Image::make($path.'/original/'.$Name);
                    $img->save($path.'/cover/'.$Name);

                    $img = Image::make($path.'/original/'.$Name);
                    $img->fit(100, null, null, 'top');
                    $img->save($path.'/card/'.$Name);
                }

            }
            $goods_update->img = $img_array;
            $goods_update->save();
        }


        return 'success';
    }
    private function getSlug($name)
    {
        $name = str_replace(" ", "-", $name);
        $newSlug =  \_Function::slugify($name);
        $findSlug = Category_description::where('slug' , $newSlug)->first();
        $findSlug_goods = Goods_description::where('slug' , $newSlug)->first();
        if($findSlug || $findSlug_goods)return $this->getSlug($name.'-'.rand(1,1000));
        return $newSlug;
    }

    public function update($id)
    {
        $goods = Goods::find($id);
        if ($goods) {
            $data['goods'] = $goods;
            $data['collections'] = Collection::all();
            return view('admin.catalog.goods.update')->with($data); // передаємо масив goods у view;
        }
    }

    public function updatePost(Request $request, $id)
    {

        $this->validate($request, [
            'name_ua' => 'required|max:255|min:1',
            'name_ru' => 'required|max:255|min:1',
            'price' => 'required|min:1|max:255'
        ]);


        $goods = Goods::find($id);

        $goods->price = $request->price;
        if($request->width)
            $goods->width = $request->width;
        if($request->depth)
            $goods->depth = $request->depth;
        if($request->height)
            $goods->height = $request->height;
            $goods->collection_id = $request->interior_id;
        $goods->save();

        $new_description = Goods_description::where('good_id' , $id)->where('language' , 'ru')->first();
        $new_description->name = $request->name_ru;
        if($request->description_ru)
            $new_description->description = $request->description_ru;
        $new_description->save();

        $new_description = Goods_description::where('good_id' , $id)->where('language' , 'ua')->first();
        $new_description->name = $request->name_ua;
        if($request->description_ua)
            $new_description->description = $request->description_ua;
        $new_description->save();

        $path = public_path('files/image/catalog/' . $goods->subcategory_id .'/'.$goods->id);
        if (!File::exists($path)) {
            File::makeDirectory($path , $mode = 0777, true, true);
        }

        if (!File::exists($path.'/mini'))File::makeDirectory($path.'/mini', $mode = 0777, true, true);
        if (!File::exists($path.'/preview'))File::makeDirectory($path.'/preview', $mode = 0777, true, true);
        if (!File::exists($path.'/card'))File::makeDirectory($path.'/card', $mode = 0777, true, true);
        if (!File::exists($path.'/original'))File::makeDirectory($path.'/original', $mode = 0777, true, true);
        if (!File::exists($path.'/cover'))File::makeDirectory($path.'/cover', $mode = 0777, true, true);

        if( isset($request->photos))
        {

            $this->validate($request, [
                'photos' => 'required',
                'photos.*' => 'mimes:jpeg,bmp,png,gif,svg'
            ]);

            $img_array = '';
            $goods_update = Goods::find($goods->id);

            foreach ($request->photos as $photo) {

               $Name = rand(0,99999999).time().'.'.$photo->getClientOriginalExtension();


                if($photo && $photo->move($path.'/original', $Name))
                {
                  
                    $img_array .='|'.$Name.'|';

                   $img = Image::make($path.'/original/'.$Name);
                    $img->fit(34, null, null, 'top');
                    $img->save($path.'/mini/'.$Name);

                    $img = Image::make($path.'/original/'.$Name);
                    $img->save($path.'/preview/'.$Name);

                    $img = Image::make($path.'/original/'.$Name);
                    $img->save($path.'/cover/'.$Name);

                    $img = Image::make($path.'/original/'.$Name);
                    $img->fit(100, null, null, 'top');
                    $img->save($path.'/card/'.$Name);
                }
            }
            $goods_update->img = $img_array.''.$goods_update->img;
            $goods_update->save();
        }


        return 'success';
    }

    public function delete($id)
    {
        $goods = Goods::findOrFail($id);
        File::deleteDirectory(public_path('files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id));
        Goods_description::where('good_id' , $id)->delete();
        $goods->delete();

        return redirect('/admin_panel/catalog/'.$goods->subcategory_id);
    }
    public function deleteImg($id , $img)
    {
        $goods = Goods::find($id);
        if($goods)
        {
            if($goods->cover == $img)return back()->with('message_error', 'Ви намагаєтесь видалити основну картинку');
            if($goods->album_cover == $img)return back()->with('message_error', 'Ви намагаєтесь видалити фонову картинку');

            if (in_array($img, explode("||", substr($goods['img'], 1, -1))))
            {
                $new_cache = str_replace("|".$img."|", "", $goods['img']);
                $goods->img = $new_cache;
                $goods->save();
                File::Delete(public_path('files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/original/'.$img));
                File::Delete(public_path('files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/mini/'.$img));
                File::Delete(public_path('files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/preview/'.$img));
                File::Delete(public_path('files/image/catalog/'.$goods->subcategory_id.'/'.$goods->id.'/card/'.$img));
            }

        }
        return redirect('/admin_panel/catalog/goods/'.$goods->id.'/update')->with('message', 'Картинку успішно видаленно');
    }
    public function setupImg($id , $img)
    {
        $good = Goods::find($id);
        if(!$good)return 'Product not find';
        $good->cover = $img;
        $good->save();
        return back()->with('message', 'Обкладинку успішно оновленно');
    }
    public function setupImgAlbumCover($id , $img)
    {
        $good = Goods::find($id);
        if(!$good)return 'Product not find';
        $good->album_cover = $img;
        $good->save();
        return back()->with('message', 'Фонову картинку успішно оновленно');
    }
}
