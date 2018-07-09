<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\News_Descripton;
use File;
use Image;


class NewsController extends Controller
{
    public function index()
    {
        $data['news']= News::orderBy('id' , 'DESC')->paginate(10);
        return view('admin.news.index')->with($data);
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required|max:255|min:1',
            'name_ua' => 'required|max:255|min:1',
            'description_ru' => 'required|max:100000|min:1',
            'description_ua' => 'required|max:100000|min:1'
        ]);
        
        $news = new News();
        $news->user_id = \Auth::id();
        if($news->save())
        {
            $path = public_path('files/news/images/' .$news->id);
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
                File::makeDirectory(public_path('files/news/images/'.$news->id).'/preview', $mode = 0777, true, true);
            }
            if(isset($request->photos))
            {
                $this->validate($request, [
                    'photos' => 'required',
                    'photos.*' => 'mimes:jpeg,bmp,png,gif,svg'
                ]);

                $img_array = '';
                $news_update = News::find($news->id);

                foreach ($request->photos as $photo) {
                    $Name = rand(0,99999999).time().'.'.$photo->getClientOriginalExtension();

                    if($photo && $photo->move($path, $Name))
                    {
                        $img_array .='|'.$Name.'|';

                        $img = Image::make($path.'/'.$Name);
                        $img->fit(260, null, null, 'top');
                        $img->save($path.'/preview/'.$Name);
                    }
                }
                $news_update->img = $img_array;
                $news_update->save();
            }
            $new_description = new News_Descripton;
            $new_description->name = $request->name_ru;
            $new_description->language = 'ru';
            $new_description->text = $request->description_ru;
            $new_description->news_id = $news->id;
            $new_description->slug = $this->getSlug($request->name_ru);
            $new_description->save();

            $new_description = new News_Descripton;
            $new_description->name = $request->name_ua;
            $new_description->language = 'ua';
            $new_description->text = $request->description_ua;
            $new_description->slug = $this->getSlug($request->name_ua);
            $new_description->news_id = $news->id;
            $new_description->save();
            return redirect()->back()->with('message', 'Новину успішно створено');
        }

    }
    private function getSlug($name)
    {
        $newSlug =  \_Function::slugify($name);
        $findSlug = News_Descripton::where('slug' , $newSlug)->first();
        $findSlug_goods = News_Descripton::where('slug' , $newSlug)->first();
        if($findSlug || $findSlug_goods)return $this->getSlug($name.'-'.rand(1,1000));
        return $newSlug;
    }
    public function edit($id)
    {
        $data['news']= News::find($id);
        $data['news_description_ru']= News_Descripton::where('news_id' , $data['news']->id)->where('language' , 'ru')->first();
        $data['news_description_ua']= News_Descripton::where('news_id' , $data['news']->id)->where('language' , 'ua')->first();
        return view('admin.news.edit')->with($data);
    }
    public function updatePost(Request $request , $id)
    {
        // return $request->all();

        $this->validate($request, [
            'name_ru' => 'required|max:255|min:1',
            'name_ua' => 'required|max:255|min:1',
            'description_ru' => 'required|max:100000|min:1',
            'description_ua' => 'required|max:100000|min:1',
            'slug_ru' => 'required|max:100000|min:1',
            'slug_ua' => 'required|max:100000|min:1'
        ]);

        $news =  News::find($id);
        if($news)
        {
            $find_slug = News_Descripton::where('slug' , $request->slug_ru)->where('news_id' , '!=' , $news->id)->first();
            $find_slug_ua = News_Descripton::where('slug' , $request->slug_ua)->where('news_id' , '!=' , $news->id)->first();
            if($find_slug)return back()->withInput()->withErrors(array('error_slug_ru' => 'Такий лінк вже існує'));
            if($find_slug_ua)return back()->withInput()->withErrors(array('error_slug_ua' => 'Такий лінк вже існує'));
            
            
            
            $path = public_path('files/news/images/' .$news->id);
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            if(isset($request->photos))
            {
                $this->validate($request, [
                    'photos' => 'required',
                    'photos.*' => 'mimes:jpeg,bmp,png,gif,svg'
                ]);

                $img_array = '';

                foreach ($request->photos as $photo) {
                    $Name = rand(0,99999999).time().'.'.$photo->getClientOriginalExtension();

                    if($photo && $photo->move($path, $Name))
                    {
                        $img_array .='|'.$Name.'|';

                        $img = Image::make($path.'/'.$Name);
                        $img->fit(260, null, null, 'top');
                        $img->save($path.'/preview/'.$Name);
                    }
                }
                $news->img = $img_array.''.$news->img;
                $news->save();
            }
            $new_description_ru = News_Descripton::where('news_id' , $news->id)->where('language' , 'ru')->first();
            if($new_description_ru){
                $new_description_ru->name = $request->name_ru;
                $new_description_ru->text = $request->description_ru;
                $new_description_ru->slug = $request->slug_ru;
                $new_description_ru->save();
            }
            $new_description_ua = News_Descripton::where('news_id' , $news->id)->where('language' , 'ua')->first();
            if($new_description_ua) {
                $new_description_ua->name = $request->name_ua;
                $new_description_ua->text = $request->description_ua;
                $new_description_ua->slug = $request->slug_ua;
                $new_description_ua->save();
            }
            return redirect()->back()->with('message', 'Новину успішно оновленно');
        }
    }
    public function deleteImg($id , $img)
    {
        $news = News::find($id);
        if($news)
        {
            if (in_array($img, explode("||", substr($news['img'], 1, -1))))
            {
                $new_cache = str_replace("|".$img."|", "", $news['img']);
                $news->img = $new_cache;
                $news->save();
                File::Delete(public_path('files/news/images/'.$news->id.'/'.$img));
            }
        }
        return redirect('/admin_panel/news/edit/'.$news->id);
    }
    public function delete($id)
    {
        $news = News::findOrFail($id);
        File::deleteDirectory(public_path('files/news/images/'.$news->id));
        News_Descripton::where('news_id' , $id)->delete();
        $news->delete();

        return redirect('/admin_panel/news/');
    }
}
