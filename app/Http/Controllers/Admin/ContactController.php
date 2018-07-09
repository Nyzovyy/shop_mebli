<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Contact_description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    public function contact(){


        $data['contact'] = Contact_description::first();

        return view('contact.view')->with($data);

    }

    public function updateGet(){

        $data['contact_ua'] = Contact_description::where('language','ua')->first();
        $data['contact_ru'] = Contact_description::where('language','ru')->first();

        return view('admin.contact.update')->with($data);

    }

    public function updatePost(Request $request)
    {

        $new_description = Contact_description::where('language' , 'ru')->first();
        $new_description->description = $request->description_ru;

        $new_description->save();

        $new_description = Contact_description::where('language' , 'ua')->first();
        $new_description->description = $request->description_ua;

        $new_description->save();




        return redirect()->back()->with('message', 'Дані успішно оновленно');
    }
}
