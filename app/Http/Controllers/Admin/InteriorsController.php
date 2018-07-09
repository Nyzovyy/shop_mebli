<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interior;
use App\Interior_description;
use File;
use Image;

class InteriorsController extends Controller
{
    public function index()
    {
        $data['interiors'] = Interior::orderBy('id' , 'DESC')->paginate(20);
        return view('admin.interior.index')->with($data);
    }
    public function create()
    {
        return view('admin.interior.create');
    }
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required|max:255|min:1',
            'name_ua' => 'required|max:255|min:1',
            'photos' => 'required|mimes:jpeg,bmp,png,gif,svg'
        ]);

        $interior = new Interior();
        if($interior->save())
        {
            $path = public_path('files/interior/images/' .$interior->id);
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
                File::makeDirectory(public_path('files/interior/images/'.$interior->id).'/preview', $mode = 0777, true, true);
            }
            if(isset($request->photos))
            {
               
                $interior_update = Interior::find($interior->id);

                $imageName = time() . '.' . $request->photos->getClientOriginalExtension();

                if ($request->photos && $request->photos->move($path, $imageName)) {
                    $interior_update->img = $imageName;
                    $interior_update->save();
                    ////make mini cover 150
                    $img = Image::make($path.'/'.$imageName);
                    $img->fit(318, 263, null, 'top');
                    $img->save($path.'/preview/'.$imageName);
                    $interior->img = $imageName;
                }

            }
            $new_description = new Interior_description;
            $new_description->name = $request->name_ru;
            $new_description->language = 'ru';
            $new_description->int_id = $interior->id;
            $new_description->slug = \_Function::getSlug('int-'.$request->name_ru);
            $new_description->save();

            $new_description = new Interior_description;
            $new_description->name = $request->name_ua;
            $new_description->language = 'ua';
            $new_description->int_id = $interior->id;
            $new_description->slug = \_Function::getSlug('int-'.$request->name_ua);
            $new_description->save();
            return redirect()->back()->with('message', 'Інтер\'єр успішно створено');
        }

    }
    public function edit($id)
    {
        $data['interior'] = Interior::findOrFail($id);
        $data['interior_ru']= Interior_description::where('int_id' , $data['interior']->id)->where('language' , 'ru')->first();
        $data['interior_ua']= Interior_description::where('int_id' , $data['interior']->id)->where('language' , 'ua')->first();

        return view('admin.interior.edit')->with($data);
    }
    public function updatePost(Request $request , $id)
    {


        $this->validate($request, [
            'name_ru' => 'required|max:255|min:1',
            'name_ua' => 'required|max:255|min:1'
        ]);

        $interior =  Interior::find($id);
        if($interior)
        {
            $path = public_path('files/interior/images/' .$interior->id);
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }



                if($request->photo) {
                    $this->validate($request, [
                        'photo' => 'required|mimes:jpeg,bmp,png,gif,svg'
                    ]);
                    File::Delete(public_path('files/interior/images/'.$interior->id.'/'.$interior->img));

                    $imageName = time() . '.' . $request->photo->getClientOriginalExtension();

                    if ($request->photo && $request->photo->move($path, $imageName)) {

                        $img = Image::make($path.'/'.$imageName);
                        $img->fit(318, 263, null, 'top');
                        $img->save($path.'/preview/'.$imageName);
                        $interior->img = $imageName;


                    }
                }


            $interior->save();
            $new_description_ru = Interior_description::where('int_id' , $interior->id)->where('language' , 'ru')->first();
            if($new_description_ru){
                $new_description_ru->name = $request->name_ru;
              //  $new_description_ru->slug = $request->slug_ru;
                $new_description_ru->save();
            }
            $new_description_ua = Interior_description::where('int_id' , $interior->id)->where('language' , 'ua')->first();
            if($new_description_ua) {
                $new_description_ua->name = $request->name_ua;
              //  $new_description_ua->slug = $request->slug_ua;
                $new_description_ua->save();
            }
            return redirect()->back()->with('message', 'Інтер\'єр успішно оновленно');
        }
    }
    public function delete($id)
    {
        $interior = Interior::findOrFail($id);
        File::deleteDirectory(public_path('files/interior/images/'.$interior->id));
        Interior_description::where('int_id' , $id)->delete();
        $interior->delete();

        return redirect('/admin_panel/interior/');
    }
}
