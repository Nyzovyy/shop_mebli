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

class CollectionsController extends Controller
{
    public function index($id)
    {
        $data['collections'] = Collection::where('category_id' , $id)->paginate(20);
        $data['id'] = $id;
       return view('admin.collection.index')->with($data);
    }
    public function create($id)
    {
        $data['interiors'] = Interior_description::where('language', 'ua')->orderBy('id', 'DESC')->get();
        $data['id'] = $id;
        return view('admin.collection.create')->with($data);
    }
    public function createPost(Request $request)
    {

        if(!Collection_category::find($request->category_id))
            return redirect('/admin_panel/collection');

        $this->validate($request, [
            'name_ua' => 'required|max:255|min:1',
            'name_ru' => 'required|max:255|min:1'
        ]);

        $collection = new Collection();
        $collection->name_ru = $request->name_ru;
        $collection->name_ua = $request->name_ua;
        $collection->interior_id = $request->interior_id;
        $collection->category_id = $request->category_id;
        $collection->slug =  \_Function::getSlug('collection-'.$request->name_ua);

        if($collection->save()){
            return redirect('/admin_panel/collection/edit/'.$collection->id);
        }
    }
    public function edit($id)
    {
        if(!Collection::find($id))
            return redirect('/admin_panel/collection');

        $data['id'] = $id;
        $data['collection'] = Collection::find($id);
        $data['contents'] = Collection_content::where('id_collection' , $id)->get();
        $data['interiors'] = Interior_description::where('language', 'ua')->orderBy('id', 'DESC')->get();
        return view('admin.collection.edit')->with($data);
    }
    public function updatePost(Request $request , $id)
    {
        $collection = Collection::find($id);
        if(!$collection)
            return 'no find collection';

        $this->validate($request, [
            'name_ua' => 'required|max:255|min:1',
            'name_ru' => 'required|max:255|min:1'
        ]);

        $collection->name_ru = $request->name_ru;
        $collection->name_ua = $request->name_ua;
        $collection->description_ru = $request->description_ru;
        $collection->description_ua = $request->description_ua;
        $collection->interior_id = $request->interior_id;
        $collection->page = $request->page;

        if($request->photo) {
            $path = public_path('files/collection/cover/'.$id);
            if (!File::exists($path))File::makeDirectory($path, $mode = 0777, true, true);
            $this->validate($request, [
                'photo' => 'required|mimes:jpeg,bmp,png,gif,svg'
            ]);
            File::Delete(public_path('files/collection/cover/'.$id.'/'.$collection->img));

            $imageName = time() . '.' . $request->photo->getClientOriginalExtension();

            if ($request->photo && $request->photo->move($path, $imageName)) {

                $collection->img = $imageName;


            }
        }
        if($request->avatar) {

            $path = public_path('files/collection/avatar/'.$id);
            if (!File::exists($path))File::makeDirectory($path, $mode = 0777, true, true);
            $this->validate($request, [
                'avatar' => 'required|mimes:jpeg,bmp,png,gif,svg'
            ]);
            File::Delete(public_path('files/collection/avatar/'.$id.'/'.$collection->avatar));

            $avatarimageName = time() . '_.' . $request->avatar->getClientOriginalExtension();

            if ($request->avatar && $request->avatar->move($path, $avatarimageName)) {

                $collection->avatar = $avatarimageName;


            }
        }

        if($collection->save())
        {
            return redirect()->back()->with('message', 'Колекцію успішно оновленно');
        }



    }
    public function remove($id){
        $collection = Collection::find($id);
        if(!$collection)
            return 'no find collection';

        File::deleteDirectory(public_path('files/collection/cover/'.$id));

        $content = Collection_content::where('id_collection' , $id)->first();
        $data = Collection_data::where('id_slider' , $content->id)->first();

        if($data){
            File::deleteDirectory(public_path('files/collection/slider/'.$data->id_slider.'/'));
            $data->delete();
        }
        if($content)
            Collection_content::where('id_collection' , $id)->delete();

        $collection->delete();
        
        return redirect('/admin_panel/collection/category/'.$collection->category_id)->with('message', 'Колекцію успішно видаленно');

    }
    public function addslider(Request $request)
    {
        $content = new Collection_content();
        $content->type = $request->type;
        $content->id_collection = $request->id_collection;
        $content->save();

        return 'success';
    }
   
}
