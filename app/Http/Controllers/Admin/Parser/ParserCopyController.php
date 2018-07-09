<?php

namespace App\Http\Controllers\Admin\Parser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sunra\PhpSimple\HtmlDomParser;
use App\Category;
use App\Category_description;
use App\Goods;
use App\Goods_description;
use File;
use Image;
use Cookie;

class ParserController extends Controller
{

    public function index()
    {

        $file = '';
        $url = 'https://vox.pl';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1');
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);
        curl_setopt($curl, CURLOPT_REFERER, "https://facebook.com/?");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        $res = curl_exec($curl);


        $data = HtmlDomParser::str_get_html($res);
        curl_close($curl);
        if ($data == false) {
            $file .= '<div class="menu">Сайт vox не працює!</div>';
            exit;
        }
        $tmp = $data->find('#mainmenu');
        if ($tmp != false) {

            foreach ($tmp as $p) {
                $menu_find_li = $p->find('.floatleft li');

                foreach ($menu_find_li as  $li){

                    $meble = $li->find('#meble', 0);
                    if($meble)
                    {
                        $row = $li->find('.row', 0);
                        $colmenu = $row->find('.colmenu');
                        foreach ($colmenu as  $colmenu_get){
                            $cat_head = $colmenu_get->find('h4 a' , 0);
                            ////////category///////////////
                            //if(strip_tags($cat_head->innertext) != 'Kolekcje ')
								$file .= '<hr><h3>'.$cat_head->innertext.'</h3>';
                            $cat = $colmenu_get->find('ul li');
                            foreach ($cat as  $cat_li){
                                $link = $cat_li->find('a' , 0);
                                //if(strip_tags($cat_head->innertext) != 'Kolekcje ')
                                //{
                                    ///////subcategory///////////
                                    $file .= '<div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="collapsed" href="/admin_panel/parser/category'.$link->href.'">
                                    '.$link->innertext.'
                                </a>
                            </h4>
                        </div></div>';
                                    // $file .= '- <a href="/admin_panel/parser/category'.$link->href.'">'.$link->innertext.'</a><br />';
                                  //  $file .= '<div>';
                                //}

                            }
                        }
                    }

                }
            }
        }
    //    $file;
        return view('admin.parser.index' , ['file'  =>  $file]);
    }
    public function category($get)
    {
        $file = '';
        $url = 'https://www.vox.pl/'.$get;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1');
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);
        curl_setopt($curl, CURLOPT_REFERER, "https://facebook.com/?");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        $res = curl_exec($curl);


        $data = HtmlDomParser::str_get_html($res);
        curl_close($curl);
        if ($data == false) {
            $file .= '<div class="menu">Сайт vox не працює!</div>';
            exit;
        }

        $tmp = $data->find('.collectAllContener');
        if ($tmp != false){


            foreach ($tmp as $p){
                $findFilter = $p->find('.filter');
                foreach ($findFilter as $filter) {
                    $name_filterString = $filter->getAttribute('data-filter-string');
                    if($name_filterString == $get)
                        $name_filter = $filter->getAttribute('data-filter');
                }
                $find_mix = $p->find($name_filter);
                    if ($find_mix != false) {
                        foreach ($find_mix as $mix) {
                            //  $file .= $mix;
                            $links = $mix->find('a');
                            foreach ($links as $link) {
                                // $file .= $link;
                                $file .= '<div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="collapsed" href="/admin_panel/parser/category'.$link->href.'">
                                    '.$link->innertext.'
                                </a>
                            </h4>
                        </div>';
                                // $file .= '- <a href="/admin_panel/parser/category'.$link->href.'">'.$link->innertext.'</a><br />';
                                $file .= '</div>';
                            }
                           
                        }
                        return view('admin.parser.product' , ['file'  =>  $file]);
                    }
                }

        }
        $tmp = $data->find('.productContainer');
        if ($tmp != false) {
            foreach ($tmp as $p) {
                $productItems =  $p->find('.productItem');
                if ($productItems != false) {
					$i = 0;
					$file .= '<div class="row">';
                    foreach ($productItems as $productItem) {
                        $productName = $productItem->find('.imageInfo .productName a', 0);
                        $productPhoto = $productItem->find('.image .item a img', 0)->getAttribute('data-src');
                       // $file_headers = @get_headers($productPhoto);
                      /*  if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                            $productPhoto = 'http://vox.pl/'.$productPhoto;
                        }*/
                      //  $file .= '- <img  alt="" src="' . $productPhoto . '"><a href="/admin_panel/parser/category/product/view' . $productName->href . '">' . $productName->innertext . '</a><br />';
						//if($i%4==0) { if($i!=0) { $file .= '</div>'; } }

						if($i%4==0) { $file .= '</div><hr><hr><div class="row">'; }

			

                        $file .= '<div class="col-xs-18 col-sm-6 col-md-3"><div class="thumbnail">';
                        $file .= '<img src="'.$productPhoto.'">';
                        $file .= '<div class="caption">';
                        $file .= '<a href ="'.$productName->href.'" data-image = "'.$productPhoto.'" class="productView"><h4>'.$productName->innertext.'</a></h4>';
                        $good = Goods::where('parse_url' , $productName->href)->first();
                        if($good)
                            $file .= '<a href="/admin_panel/catalog/goods/'.$good->id.'/update" class="btn btn-success"> Збережено </a>';
                         $file .= '
                    </div>
                </div>
            </div>';
						$i++;
                    }
					$file .= '</div>';
                }
            }
            return view('admin.parser.category' , ['file'  =>  $file]);
        }

    }
    public function testcategory($get)
    {
        $file = '';
        $url = 'https://www.vox.pl/'.$get;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1');
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);
        curl_setopt($curl, CURLOPT_REFERER, "https://facebook.com/?");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        $res = curl_exec($curl);


        $data = HtmlDomParser::str_get_html($res);
        curl_close($curl);
        if ($data == false) {
            $file .= '<div class="menu">Сайт vox не працює!</div>';
            exit;
        }

        $name = $data->find('head title' , 0)->innertext;
        // $file .= $name;
        //  $collection_data_return = collect([$name]);

        $tmp = $data->find('.product-info-row');
        foreach ($tmp as $p) {

            //  $file .= $p;
            /////////////////////photos/////////////////////////////////////
            $photos_find = $p->find('.product-photo-container .vox-product-pw-gallery', 0);
            if ($photos_find != false) {
                $product_item = $photos_find->find('.vox-product-pw-gallery-item');
                if ($product_item != false) {
                    $collection_data_img = '';
                    $collection_data_img_save = collect([]);
                    foreach ($product_item as $photos) {
                        if ($photos != false) {

                            $get_id = $photos->getAttribute('data-body');
                            if ($get_id > 0) {
                                $photo = $photos->find('a img', 0);
                             //   $file .= $photo->getAttribute('src');
                                $collection_data_img .= '|' . $photo->getAttribute('src') . '|';
                                $collection_data_img_save->push($photo->getAttribute('src'));

                                //$collection_data_img->push($photo);
                            }else{
                                $photo = $photos->find('a img', 0);
                                if ($photo) {
                                    $collection_data_img .= '|' . $photo->getAttribute('src') . '|';
                                }
                            }


                            //  $file .= $photo->getAttribute('src');


                        }

                    }
                    // $collection_data_return_all->put('images', $collection_data_img);
                }
            }
            // $collection_data_return->push($p);
        }

        $tmp_descr = $data->find('#mainMenu');
        if ($tmp_descr != false) {
            foreach ($tmp_descr as $p_descr) {
                //    $file .= strip_tags($p_descr);
                //$file .= $p_descr;
            }
        }
        ////////////about product/////////////////////////////
        $tmp_descr = $data->find('.product-description-section');
        if ($tmp_descr != false) {
            foreach ($tmp_descr as $p_descr) {
                //   $file .= strip_tags($p_descr);
                $collection_data_descr = collect(strip_tags($p_descr));
            }
        }
        ///////////////class product-details////////////////
        $tmp_descr = $data->find('.product-details');
        if ($tmp_descr != false) {
            $collection_data_parametrs = collect([]);
            foreach ($tmp_descr as $p_descr) {
                //$tabledim = $p_descr->find('.table-dim' , 0);
                $tabledim = $p_descr->find('.product-dim .row .dim-values ul li');

                foreach ($tabledim as $li) {
                    if($li->getAttribute('data-key') == 'a')
                        $collection_data_parametrs->put('width' , $li->innertext());
                    else if($li->getAttribute('data-key') == 'b')
                        $collection_data_parametrs->put('depth' , $li->innertext());
                    else if($li->getAttribute('data-key') == 'c')
                        $collection_data_parametrs->put('height' , $li->innertext());
                }

                // $data->find('.product-details');

            }
        }

        //////////////color/////////////
        $tmp_color = $data->find('.table-dim .vox-product-colors a .colorSample');
        if ($tmp_color != false) {
            $collection_data_color = collect([]);
            $i = 0;
            foreach ($tmp_color as $table_dim) {
                //    $file .= strip_tags($p_descr);
                /*    $get_id_color_ = $table_dim->parent();
                    $get_id_color = $get_id_color_->getAttribute('data-body');*/
                $str = substr($table_dim->getAttribute('style'), 0, strrpos($table_dim->getAttribute('style'), ')'));
                $url = str_replace("background-image:url(", "", $str);
                $collection_data_color->put($url);
                $file .= $url;
            $i++;
            }
        }

         return $collection_data_img_save;
        // if(count($collection_data_img))
        //$collection_data_return_all->put('images', $collection_data_img);

        //

        //  return $collection_data_color;

    }
    public function product(Request $request , $get)
    {
        $file = '';
        $url = 'https://www.vox.pl/'.$get;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1');
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);
        curl_setopt($curl, CURLOPT_REFERER, "https://facebook.com/?");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        $res = curl_exec($curl);


        $data = HtmlDomParser::str_get_html($res);
        curl_close($curl);
        if ($data == false) {
            $file .= '<div class="menu">Сайт vox не працює!</div>';
            exit;
        }
    $tmp = $data->find('.productContainer');
            if ($tmp != false) {
                foreach ($tmp as $p) {
                    $productItems =  $p->find('.productItem');
                        foreach ($productItems as $productItem) {
                            if($productPhoto)
                            {
                                $productName = $productItem->find('.imageInfo .productName a', 0);
                                $productPhoto = $productItem->find('.image .item a img', 0)->getAttribute('data-src');
                                $file .= '<div class="col-xs-18 col-sm-6 col-md-3"><div class="thumbnail">';
                                $file .= '<img src="'.$productPhoto.'" style="display:block;">';
                                $file .= '<div class="caption">';
                                $file .= '<a href ="/admin_panel/parser/category/product/view'.$productName->href.'"><h4>'.$productName->innertext.'</a></h4>';
                                $file .= '</div></div>';
                            }


                           // $file .= '- <img  alt="" src="'.$productPhoto.'"><a href="/admin_panel/parser/category/product/view'.$productName->href.'">'.$productName->innertext.'</a><br />';
                       }
                }
                return view('admin.parser.product' , ['file'  =>  $file]);
            }
       return $file;
    }
    public function productView(Request $request , $get)
    {
        $file = '';
        $url = 'https://www.vox.pl/'.$get;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1');
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);
        curl_setopt($curl, CURLOPT_REFERER, "https://facebook.com/?");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        $res = curl_exec($curl);


        $data = HtmlDomParser::str_get_html($res);
        curl_close($curl);
        if ($data == false) {
            $file .= '<div class="menu">Сайт vox не працює!</div>';
            exit;
        }

        $name = $data->find('head title' , 0)->innertext;
       // $file .= $name;
      //  $collection_data_return = collect([$name]);

        $tmp = $data->find('.product-info-row');
        foreach ($tmp as $p) {

            //  $file .= $p;
            /////////////////////photos/////////////////////////////////////
            $photos_find = $p->find('.product-photo-container .vox-product-pw-gallery', 0);
             if ($photos_find != false) {
            $product_item = $photos_find->find('.vox-product-pw-gallery-item');
            if ($product_item != false) {
                $collection_data_img = '';
                foreach ($product_item as $photos) {
                    if ($photos != false) {

                        $get_id = $photos->getAttribute('data-body');
                        if ($get_id > 0) {
                            $photo = $photos->find('a img', 0);
                            $file .= $photo->getAttribute('src');
                            $collection_data_img .= '|' . $photo->getAttribute('src') . '|';
                            //$collection_data_img->push($photo);
                        }else{
                            $photo = $photos->find('a img', 0);
                            if ($photo) {
                                $collection_data_img .= '|' . $photo->getAttribute('src') . '|';
                            }
                        }


                        //  $file .= $photo->getAttribute('src');


                    }

                }
                // $collection_data_return_all->put('images', $collection_data_img);
            }
        }
           // $collection_data_return->push($p);
        }

        $tmp_descr = $data->find('#mainMenu');
        if ($tmp_descr != false) {
            foreach ($tmp_descr as $p_descr) {
            //    $file .= strip_tags($p_descr);
                //$file .= $p_descr;
            }
        }
        ////////////about product/////////////////////////////
        $tmp_descr = $data->find('.product-description-section');
        if ($tmp_descr != false) {
            foreach ($tmp_descr as $p_descr) {
               //   $file .= strip_tags($p_descr);
                $collection_data_descr = collect(strip_tags($p_descr));
            }
        }
        ///////////////class product-details////////////////
        $tmp_descr = $data->find('.product-details');
        if ($tmp_descr != false) {
            $collection_data_parametrs = collect([]);
            foreach ($tmp_descr as $p_descr) {
                //$tabledim = $p_descr->find('.table-dim' , 0);
                $tabledim = $p_descr->find('.product-dim .row .dim-values ul li');

                foreach ($tabledim as $li) {
                    if($li->getAttribute('data-key') == 'a')
                    $collection_data_parametrs->put('width' , $li->innertext());
                    else if($li->getAttribute('data-key') == 'b')
                    $collection_data_parametrs->put('depth' , $li->innertext());
                    else if($li->getAttribute('data-key') == 'c')
                        $collection_data_parametrs->put('height' , $li->innertext());
                }

               // $data->find('.product-details');

            }
        }

        //////////////color/////////////
        $tmp_color = $data->find('.table-dim .vox-product-colors a .colorSample');
        if ($tmp_color != false) {
            $collection_data_color = collect([]);
            foreach ($tmp_color as $table_dim) {
                //    $file .= strip_tags($p_descr);
            /*    $get_id_color_ = $table_dim->parent();
                $get_id_color = $get_id_color_->getAttribute('data-body');*/
                $str = substr($table_dim->getAttribute('style'), 0, strrpos($table_dim->getAttribute('style'), ')'));
                $url = str_replace("background-image:url(", "", $str);
                $collection_data_color->push($url);
                $file .= $url;

            }
        }

       // return $file;
       // if(count($collection_data_img))
        //$collection_data_return_all->put('images', $collection_data_img);

     //
        $collection_data_return_all = collect(['name' => $name]);
        if(isset($collection_data_img))
            $collection_data_return_all->put('images', $collection_data_img);
        else
            $collection_data_return_all->put('images', '|'.$request->image.'|');
        
        if(isset($collection_data_parametrs))
        $collection_data_return_all->put('parametrs', $collection_data_parametrs);

        if(isset($collection_data_descr))
        $collection_data_return_all->put('about', $collection_data_descr);

       /* if(isset($collection_data_color))
        $collection_data_return_all->put('colors', $collection_data_color);*/

     //  return $collection_data_color;
        $categories = Category::where('parent_id' , '!=', 0)->get();
        return view('admin.parser.productView' , ['file'  =>  $collection_data_return_all, 'categories'  =>  $categories , 'get' => $get]);
    }
    public function savePost(Request $request)
    {
        $category_id = intval($request->category);
        $path = public_path('files/images/catalog/'.$category_id);

        if(!File::exists($path))
        {
            File::makeDirectory($path, $mode = 0777, true, true);
            File::makeDirectory(public_path('files/images/catalog/'.$category_id).'/', $mode = 0777, true, true);
         }


        if(!$request->price)$request->price = 0;
        $goods = new Goods();
        $goods->price = $request->price;
        if($request->width)
            $goods->width = $request->width;
        if($request->depth)
            $goods->depth = $request->depth;
        if($request->height)
            $goods->height = $request->height;
        $goods->subcategory_id = $request->category;
        $goods->parse_url = '/'.$request->parse_url;
        $goods->save();

        $new_description = new Goods_description;
        $new_description->name = $request->name_ru;
        $new_description->language = 'ru';
        if($request->description_ru)
            $new_description->description = $request->description_ru;
        $new_description->slug = $this->getSlug($request->name_ru);
        $new_description->good_id = $goods->id;
        $new_description->save();

        $new_description = new Goods_description;
        $new_description->name = $request->name_ua;
        $new_description->language = 'ua';
        if($request->description_ua)
            $new_description->description = $request->description_ua;
        $new_description->slug = $this->getSlug($request->name_ua);
        $new_description->good_id = $goods->id;
        $new_description->save();

        if($goods)
        {
            $update_product = Goods::find($goods->id);
            $path_file = public_path('files/image/catalog/'.$category_id.'/'.$goods->id);
            if(!File::exists($path_file))
            {
                File::makeDirectory($path, $mode = 0777, true, true);
                File::makeDirectory(public_path('files/image/catalog/'.$category_id.'/'.$goods->id).'/mini', $mode = 0777, true, true);
                File::makeDirectory(public_path('files/image/catalog/'.$category_id.'/'.$goods->id).'/preview', $mode = 0777, true, true);
                File::makeDirectory(public_path('files/image/catalog/'.$category_id.'/'.$goods->id).'/card', $mode = 0777, true, true);
                File::makeDirectory(public_path('files/image/catalog/'.$category_id.'/'.$goods->id).'/original', $mode = 0777, true, true);
            }
            if($request->images)
            {
                $q_photo = explode("||", substr($request->images, 1, -1));
                $count_photo = count($q_photo);
                if($count_photo > 0)
                    for($a = 0 ; $a < $count_photo; $a++)
                    {
                        $file_name = rand(0 , 1000).'_'.time().'.jpg';
                        $url  = $q_photo[$a];
                        $path = 'files/image/catalog/'.$category_id.'/'.$goods->id.'/original/'.$file_name;
                        $ch = curl_init();
                        $fp = fopen($path, "w+");
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_FAILONERROR, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_FILE, $fp);
                        curl_exec($ch);
                        curl_close($ch);
                        fclose($fp);

                        $img = Image::make($path);
                        $img->fit(34, null, null, 'top');
                        $img->save($path_file.'/mini/'.$file_name);

                        $img = Image::make($path);
                        $img->resize(260, 260);
                        $img->save($path_file.'/preview/'.$file_name);
                        
                        $img = Image::make($path);
                        $img->fit(100, 260, null, 'top');
                        $img->save($path_file.'/preview/'.$file_name);

                        $update_product->img = $update_product->img."|".$file_name."|";
                        $update_product->save();
                    }
            }
        }
   
        if(Cookie::get('admin_category_parser'))
            Cookie::forget('admin_category_parser');

        Cookie::queue('admin_category_parser', $category_id, 6000);

        return 'success';

    }
    private function getSlug($name)
    {
        $name = str_replace(" ", "-", $name);
        $newSlug =  \_Function::retranslit($name);
        $findSlug = Category_description::where('slug' , $newSlug)->first();
        $findSlug_goods = Goods_description::where('slug' , $newSlug)->first();
        if($findSlug || $findSlug_goods)return $this->getSlug($name.'-'.rand(1,1000));
        return $newSlug;
    }
}
