<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Collection_category;
use App\Collection;
use App\Collection_content;
use App\Collection_data;
use File;
use Validator;

class CollectionSliderController extends Controller
{
    public function index($id)
    {
        $slider = Collection_content::find($id);
        if(!$slider)return 'error. Not found slider';

        $collection = Collection::find($slider->id_collection);
        if(!$collection)return 'error. Not found collection';

        $data = Collection_data::where('id_slider' , $id)->get();

        return view('admin.collection.slider.index' , ['slider' => $slider , 'collection' => $collection , 'dataAll' => $data]);
    }
    public function add($id)
    {
        $slider = Collection_content::find($id);
        if(!$slider)return 'error. Not found slider';

        $collection = Collection::find($slider->id_collection);
        if(!$collection)return 'error. Not found collection';
        
        return view('admin.collection.slider.add' , ['slider' => $slider , 'collection' => $collection]);

    }
    public function uploadPhotos(Request $request , $id)
    {

        $slider = Collection_content::find($id);
        if (!$slider) return 'error. Not found slider';

        $collection = Collection::find($slider->id_collection);
        if (!$collection) return 'error. Not found collection';

        $path = public_path('files/collection/slider/' . $id);
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
    if($slider->type == 'pictures')
    {


        $this->validate($request, [
            'photos' => 'required|mimes:jpeg,bmp,png,gif,svg',
        ]);
                $Name = rand(0, 99999999) . time() . '.' . $request->photos->getClientOriginalExtension();

                if ($request->photos && $request->photos->move($path, $Name)) {
                    $new_data = new Collection_data;
                    $new_data->photo = $Name;
                    $new_data->id_slider = $id;
                    $new_data->save();
                }

            return redirect('/admin_panel/collection/slider/'.$id)->with('message', 'Колекцію успішно оновленно');


    }
    elseif ($slider->type == 'pictures+test')
    {

        ////////////////photo+text/////////////////////////
        $this->validate($request, [
            'description_ru' => 'required|max:100000|min:1',
            'description_ua' => 'required|max:100000|min:1',
            'photo_text' => 'required|mimes:jpeg,bmp,png,gif,svg'
        ]);
            $imageName = time() . '.' . $request->photo_text->getClientOriginalExtension();

            if ($request->photo_text && $request->photo_text->move($path, $imageName)) {
                $new_data = new Collection_data;
                $new_data->photo = $imageName;
                $new_data->id_slider = $id;
                $new_data->description_ru = $request->description_ru;
                $new_data->description_ua = $request->description_ua;
                $new_data->save();
                return redirect('/admin_panel/collection/slider/'.$id)->with('message', 'Колекцію успішно оновленно');
            }

        }else{

            ////////////////photo+text+photo/////////////////////////
        $this->validate($request, [
            'description_ru' => 'required|max:100000|min:1',
            'description_ua' => 'required|max:100000|min:1',
            'photo_text1' => 'required|mimes:jpeg,bmp,png,gif,svg',
            'photo_text2' => 'required|mimes:jpeg,bmp,png,gif,svg'
        ]);
        $imageName1 = '_'.time() . '.' . $request->photo_text1->getClientOriginalExtension();
        $imageName2 = time() . '.' . $request->photo_text2->getClientOriginalExtension();

        if ($request->photo_text1 && $request->photo_text1->move($path, $imageName1) && $request->photo_text2 && $request->photo_text2->move($path, $imageName2)) {
            $new_data = new Collection_data;
            $new_data->photo = $imageName1;
            $new_data->id_slider = $id;
            $new_data->description_ru = $request->description_ru;
            $new_data->description_ua = $request->description_ua;
            $new_data->photo_second = $imageName2;
            $new_data->save();
            return redirect('/admin_panel/collection/slider/'.$id)->with('message', 'Слайдер успішно оновленно');
        }

    }



    }
    public function delete($id , $data_id)
    {
        $data = Collection_data::findOrFail($data_id);
        if($data)
        {
            File::Delete(public_path('files/collection/slider/'.$data->id_slider.'/'.$data->photo));
            $data->delete();
        }
        return back()->with('message', 'Картинку успішно видалено');

    }
    public function update(Request $request , $id)
    {
        $data = Collection_data::findOrFail($id);
        if($data)
        {
            $data->description_ru = $request->description_ru;
            $data->description_ua = $request->description_ua;
            $data->save();
            return 'success';
        }

    }
    public function deleteall($id)
    {
        $data = Collection_data::where('id_slider' , $id)->first();
        if($data)
        {
            File::deleteDirectory(public_path('files/collection/slider/'.$data->id_slider.'/'));
            $data->delete();
        }
        $content = Collection_content::find($id);
        if($content) $content->delete();

        return 'success';
    }
    public function edit($id)
    {
        $data = Collection_data::find($id);
        if(!$data)return 'error. Not found data';

        $slider = Collection_content::find($data->id_slider);
        if(!$slider)return 'error. Not found slider';

        $collection = Collection::find($slider->id_collection);
        if(!$collection)return 'error. Not found collection';

        return view('admin.collection.slider.edit' , ['slider' => $slider , 'collection' => $collection , 'data' => $data]);
    }
    public function editSave(Request $request , $id)
    {
        $data = Collection_data::find($id);
        if(!$data)return 'error. Not found data';

        $slider = Collection_content::find($data->id_slider);
        if(!$slider)return 'error. Not found slider';

        $collection = Collection::find($slider->id_collection);
        if(!$collection)return 'error. Not found collection';


        $path = public_path('files/collection/slider/' . $data->id_slider);
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        if($slider->type == 'pictures')
        {
            $this->validate($request, [
                'photos' => 'required',
                'photos.*' => 'mimes:jpeg,bmp,png,gif,svg'
            ]);
            if (isset($request->photos)) {



                foreach ($request->photos as $photo) {


                    $Name = rand(0, 99999999) . time() . '.' . $photo->getClientOriginalExtension();

                    if ($photo && $photo->move($path, $Name)) {
                        $new_data = new Collection_data;
                        $new_data->photo = $Name;
                        $new_data->id_slider = $id;
                        $new_data->save();


                    }
                }
                return redirect()->back()->with('message', 'Слайдер успішно оновленно');

            }
        }
        elseif ($slider->type == 'pictures+test')
        {
            ////////////////photo+text/////////////////////////
            $this->validate($request, [
                'description_ru' => 'required|max:100000|min:1',
                'description_ua' => 'required|max:100000|min:1'
            ]);
            if($request->photo_text) {
                $this->validate($request, [
                    'photo_text' => 'required|mimes:jpeg,bmp,png,gif,svg'
                ]);
                File::Delete(public_path('files/collection/slider/'.$data->id_slider.'/'.$data->photo));

                $imageName = time() . '.' . $request->photo_text->getClientOriginalExtension();

                if ($request->photo_text && $request->photo_text->move($path, $imageName)) {

                    $data->photo = $imageName;


               }
            }
            $data->description_ru = $request->description_ru;
            $data->description_ua = $request->description_ua;
            $data->save();
            return redirect()->back()->with('message', 'Слайдер успішно оновленно');

        }else{

            ////////////////photo+text+photo/////////////////////////
            $this->validate($request, [
                'description_ru' => 'required|max:100000|min:1',
                'description_ua' => 'required|max:100000|min:1'
            ]);
            if($request->photo_text1){

                $this->validate($request, [
                    'photo_text1' => 'required|mimes:jpeg,bmp,png,gif,svg'
                ]);
                File::Delete(public_path('files/collection/slider/'.$data->id_slider.'/'.$data->photo));
                $imageName1_ = '_'.time() . '.' . $request->photo_text1->getClientOriginalExtension();
                if ($request->photo_text1 && $request->photo_text1->move($path, $imageName1_)) {
                    $data->photo = $imageName1_;

                }
            }
            if($request->photo_text2){
                $this->validate($request, [
                    'photo_text2' => 'required|mimes:jpeg,bmp,png,gif,svg'
                ]);
                File::Delete(public_path('files/collection/slider/'.$data->id_slider.'/'.$data->photo_second));
                $imageName2_ = time() . '.' . $request->photo_text2->getClientOriginalExtension();
                if ($request->photo_text2 && $request->photo_text2->move($path, $imageName2_)) {
                    $data->photo_second = $imageName2_;

                }
            }
            $data->description_ru = $request->description_ru;
            $data->description_ua = $request->description_ua;
            $data->save();

            return redirect()->back()->with('message', 'Слайдер успішно оновленно');
        }

    }
}
