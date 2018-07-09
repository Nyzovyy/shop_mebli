<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    public function index()
    {
        if(!About::first()){
            $about = new About();
            $about->save();
        }
        $data['about'] = About::first();
        return view('admin.about_us.index')->with($data);
    }
    public function post(Request $request)
    {
        if(!About::first()){
            $about = new About();
            $about->save();
        }
        $about = About::first();

        if(count($request->all())){
            foreach ($request->all() as $key => $item){

                if($key != '_token'){
                    $about->$key = $item;
                }

            }
            $about->save();
        }
        return redirect()->back()->with('message', 'Дані успішно оновленно');
    }
    public function view()
    {
        $data['about'] = About::first();
        return view('about_us.index')->with($data);
    }
}
