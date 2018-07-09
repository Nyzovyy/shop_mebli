<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interior;
use App\Interior_description;
use File;
use Image;
use App\Collection_category;
use App\Collection;
use App\Collection_content;
use App\Collection_data;

class CollectionsCategoryController extends Controller
{
    public function index()
    {
        $data['inter'] = Interior::count();
        $data['categories'] = Collection_category::orderBy('id' , 'DESC')->paginate(30);
        return view('admin.collection.category.index')->with($data);
    }
    public function create()
    {
        return view('admin.collection.category.create');
    }
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name_ua' => 'required|max:255|min:1',
            'name_ru' => 'required|max:255|min:1'
        ]);
        
        $collect = new Collection_category;
        $collect->name_ua = $request->name_ua;
        $collect->name_ru = $request->name_ru;
        if($collect->save())
        {
            return redirect()->back()->with('message', 'Категорію успішно створено');
        }
    }
    public function edit($id)
    {
        $category = Collection_category::find($id);
        if($category){
            return view('admin.collection.category.edit' , ['category' => $category]);
        }
    }
    public function editPost(Request $request , $id)
    {
        $this->validate($request, [
            'name_ru' => 'required|max:255|min:1',
            'name_ua' => 'required|max:255|min:1'
        ]);
        $category = Collection_category::find($id);
        if($category){
            $category->name_ua = $request->name_ua;
            $category->name_ru = $request->name_ru;
            $category->save();
            return redirect()->back()->with('message', 'Дані успішно оновленно');
        }
    }
    public function delete($id)
    {
        $category = Collection_category::find($id);
        if($category) {

            $collection = Collection::where('category_id', $id)->first();
            if($collection) {

            File::deleteDirectory(public_path('files/collection/cover/' . $collection->id));

            $content = Collection_content::where('id_collection', $collection->id)->first();
            $data = Collection_data::where('id_slider', $content->id)->first();

            if ($data) {
                File::deleteDirectory(public_path('files/collection/slider/' . $data->id_slider . '/'));
                $data->delete();
            }
            if ($content)
                Collection_content::where('id_collection', $collection->id)->delete();

            $collection->delete();


        }
            $category->delete();
            return redirect()->back()->with('message', 'Розділ успішно видаленно');
        }
    }
    
}
