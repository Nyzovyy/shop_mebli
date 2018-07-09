<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\News_Descripton;

class NewsController extends Controller
{
    public function index()
    {
        $data['news'] = News::orderBy('id' , 'DESC')->paginate(11);
        return view('news.index')->with($data);
    }
    public function view($slug)
    {
        $slug = News_Descripton::where('slug' , $slug)->first();
        if($slug)
        {
            $data['news'] = News::find($slug->news_id);
            return view('news.view')->with($data);
        }
        return redirect('/');
    }
}
