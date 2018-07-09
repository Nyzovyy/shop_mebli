<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Goods_description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Category_description;
use App\Goods;
use Validator;
use File;

class CategoryController extends Controller
{
    public function category(){
//      передаємо в змінну $date моодель Categories пагінація(paginate 30 на сторінку) -------------
//      where('parent_id', 0) умова для виводу дочірніх категорій
        $data['categories'] = Category::where('parent_id', 0)->orderBy('id' , 'DESC')->paginate(30);
      

        $data['id'] = 0;

        return view('admin.catalog.category.view')->with($data); // передаємо масив categories у view
    }
    
    public function subcategory($id){

        //      передаємо в змінну $date моодель goods пагінація(paginate 30 на сторінку) -------------
        $data['goods'] = Goods::where('subcategory_id' , $id)->orderBy('id' , 'DESC')->paginate(30);
        $data['category'] = Category::find($id);
        $data['id'] = $id;
        return view('admin.catalog.category.subcategory')->with($data); // передаємо масив goods у view;;
    }
    
    public function status($id){
        $category = Category::find($id);
        if ($category){

            if($category->status == 0)
            {
                $category->status = 1;
            }else{
                $category->status = 0;
            }
            $category->save();
            $sub_category = Category::where('parent_id', $id)->get();
            if (count($sub_category)) {
                foreach ($sub_category as $sub) {
                    $subcategory = Category::find($sub->id);
                    $subcategory->status = $category->status;
                    $subcategory->save();
                }
            }
        }
        return back();
    }

    
    public function create($id)
    {
        $category = Category::find($id);
        $data['category'] = $category;
        if($id == 0)
        {
            $data['id'] = 0;
            return view('admin.catalog.category.create')->with($data); // передаємо масив category у view;
        }

        if ($category) {
            $data['id'] = $category->id;
            return view('admin.catalog.category.create')->with($data); // передаємо масив category у view;
        }
    
    }

    // Зберігання категорії
    public function createPost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_ru' => 'required|max:255',
            'name_ua' => 'required|max:255',

        ]);
        if ($validator->fails()) return var_dump($validator->fails());



        
        $category = new Category();
        $category->parent_id = $id;
        

        
        if($category->save())
        {
            $category_descr = new Category_description();
            $category_descr->category_id = $category->id;
            $category_descr->name = $request->name_ru;
            $category_descr->language = 'ru';
            $category_descr->slug =  \_Function::getSlug('category-'.$request->name_ru);
            $category_descr->save();

            $category_descr = new Category_description();
            $category_descr->category_id = $category->id;
            $category_descr->name = $request->name_ua;
            $category_descr->slug =  \_Function::getSlug('category-'.$request->name_ua);
            $category_descr->language = 'ua';
            $category_descr->save();

            $category_update  = Category::find($category->id);
            $path = public_path('files/image/catalog/' . $category->id);
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            if ($request->image) {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();

                if ($request->image && $request->image->move($path, $imageName)) {
                    $category_update->cover = $imageName;
                    $category_update->save();
                }
            }
            return 'success';
        }


        return 'err';
    }

    public function update($id)
    {

        $category = Category::find($id);
        if ($category) {
            $data['category'] = $category;
            $data['category_descriptions'] = Category_description::where('category_id' , $id)->get();
            return view('admin.catalog.category.update')->with($data); // передаємо масив category у view;
        }

    }

    // Зберігання категорії
    public function updatePost(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name_ua' => 'required|max:255',
            'name_ru' => 'required|max:255',

        ]);
        if ($validator->fails()) return var_dump($validator->fails());

        $category =  Category::find($id);
        $path = public_path('files/image/catalog/' . $id);
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        if ($request->image) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        }
        if ($request->image && $request->image->move($path, $imageName)) {
            File::Delete(public_path('files/image/catalog/'.$id.'/'.$category->cover));
            $category->cover = $imageName;
            $category->save();
        }
        $categorys =  Category_description::where('category_id' , $category->id)->get();
        foreach ($categorys as $category_descr)
        {
            if($category_descr->language == 'ru')
            $category_descr->name = $request->name_ru;
            else
                $category_descr->name = $request->name_ua;

            $category_descr->save();
        }

        return back()->with('message', 'Категорію успішно оновленно');

    }
    public function modalRemove(Request $request, $id)
    {
        return view('admin.catalog.category.modalremove', ['id' => $id]);
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Category_description::where('category_id' , $id)->delete();
        $goods = Goods::where('subcategory_id' , $id)->get();
        foreach($goods as $good)
        {
            Goods_description::where('good_id' , $good_id)->delete();
            $good->delete();
        }
        File::deleteDirectory(public_path('files/image/catalog/' . $id));
        return back();
    }
}
