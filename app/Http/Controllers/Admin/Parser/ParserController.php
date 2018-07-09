<?php

namespace App\Http\Controllers\Admin\Parser;

use App\Goods_color;
use App\Goods_color_photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sunra\PhpSimple\HtmlDomParser;
use App\Category;
use App\Category_description;
use App\Goods;
use App\Goods_description;
use App\Colors_category;
use App\Http\Controllers\Admin\Parser\FileController;
use File;
use Image;
use Cookie;

class ParserController extends Controller
{

    public function index()
    {

        $file = '';
        $url = 'https://vox.pl/ru';
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
                                <a class="collapsed" href="/admin_panel/parser/category?get='.$link->href.'">
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
    public function category()
    {
        $get = $_GET['get'];
        $file = '';
        $url = 'https://www.vox.pl'.$get;
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
        if ($tmp != false) {

            foreach ($tmp as $p) {
                $findFilter = $p->find('.filter');
                foreach ($findFilter as $filter) {
                    $name_filterString = $filter->getAttribute('data-filter-string');
                    if ($name_filterString != $get)
                    {
                        return "error \"name_filter\"";
                    }
                        $name_filter = $filter->getAttribute('data-filter');
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
                                <a class="collapsed" href="/admin_panel/parser/category?get=' . $link->href . '">
                                    ' . $link->innertext . '
                                </a>
                            </h4>
                        </div>';
                            // $file .= '- <a href="/admin_panel/parser/category'.$link->href.'">'.$link->innertext.'</a><br />';
                            $file .= '</div>';
                        }

                    }
                    return view('admin.parser.product', ['file' => $file]);
                }
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
                        if ($productItem != false) {

                        $productName = $productItem->find('.imageInfo .productName a', 0);
                        $productPhoto = $productItem->find('.image .item a img', 0)
                        ? $productItem->find('.image .item a img', 0)->getAttribute('data-src') : null;
                        if($productName){
                       // $file_headers = @get_headers($productPhoto);
                      /*  if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                            $productPhoto = 'http://vox.pl/'.$productPhoto;
                        }*/
                      //  $file .= '- <img  alt="" src="' . $productPhoto . '"><a href="/admin_panel/parser/category/product/view' . $productName->href . '">' . $productName->innertext . '</a><br />';
						//if($i%4==0) { if($i!=0) { $file .= '</div>'; } }

						if($i%4==0) { $file .= '</div><hr><div class="row">'; }

			

                        $file .= '<div class="col-xs-18 col-sm-6 col-md-3"><div class="thumbnail">';
                    //    $file .= '<img src="'.$productPhoto.'">';
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
                    }
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
        $url = 'https://www.vox.pl//'.$get;
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
                            $productPhoto = $productItem->find('.image .item a img', 0)->getAttribute('data-src');
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
            //$productPhoto = $productItem->find('.image .item a img', 0)->getAttribute('data-src');
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
        $fileController = new FileController();
        return $fileController($request->all());
    }
}
