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

class ProductController extends Controller
{
    public function index(Request $request, $get)
    {
        $file = '';
        $url = 'https://www.vox.pl/ru/' . $get;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1');
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);
        curl_setopt($curl, CURLOPT_REFERER, "https://facebook.com/?");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $res = curl_exec($curl);


        $data = HtmlDomParser::str_get_html($res);
        curl_close($curl);
        if ($data == false) {
            $file .= '<div class="menu">Сайт vox не працює!</div>';
            exit;
        }

        $name = $data->find('head title', 0)->innertext;
        $collection_data_img = '';
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

                    foreach ($product_item as $photos) {
                        if ($photos != false) {

                            $get_id = $photos->getAttribute('data-body');
                            if ($get_id > 0) {
                                $photo = $photos->find('a img', 0);
                                $file .= $photo->getAttribute('src');
                                $collection_data_img .= '|' . $photo->getAttribute('src') . '|';
                                //$collection_data_img->push($photo);
                            } else {
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
        /*  $tmp_descr = $data->find('.product-description-section');
          if ($tmp_descr != false) {
              foreach ($tmp_descr as $p_descr) {
                  //   $file .= strip_tags($p_descr);
                  $collection_data_descr = collect(strip_tags($p_descr));
              }
          }*/
        ///////////////class product-details////////////////
        $tmp_descr = $data->find('.product-details');
        if ($tmp_descr != false) {
            $collection_data_parametrs = collect([]);
            foreach ($tmp_descr as $p_descr) {
                //$tabledim = $p_descr->find('.table-dim' , 0);
                $tabledim = $p_descr->find('.product-dim .row .dim-values ul li');

                foreach ($tabledim as $li) {
                    if ($li->getAttribute('data-key') == 'a')
                        $collection_data_parametrs->put('width', $li->innertext());
                    else if ($li->getAttribute('data-key') == 'b')
                        $collection_data_parametrs->put('depth', $li->innertext());
                    else if ($li->getAttribute('data-key') == 'c')
                        $collection_data_parametrs->put('height', $li->innertext());
                }

                // $data->find('.product-details');

            }
        }

        //////////////colors/////////////
        /*  $tmp_color = $data->find('#mainMenu .panel .collapse .panel-body .color-row');
          if ($tmp_color != false) {
              $collection_data_color = collect([]);
              foreach ($tmp_color as $table_dim) {

                  $file .= $table_dim;
                  $tmp_color_get_row = $table_dim->find('.color-row');
                  if ($tmp_color_get_row != false) {
                      foreach ($tmp_color_get_row as $color_row) {

                        //  $file .= $color_row;
                          $tmp_color_get_dekor = $color_row->find('.dekor');
                          if ($tmp_color_get_dekor != false) {
                              foreach ($tmp_color_get_dekor as $dekor) {

                                  $img = $dekor->find('.img' , 0);
                                  //$file .= $dekor;





                              }
                          }




                      }
                  }

              }
          }
  */

        // return $file;
        $collection_data_return_all = collect(['name' => $name]);
        if (count($collection_data_img))
            $collection_data_return_all->put('images', $collection_data_img);

        if (isset($collection_data_parametrs))
            $collection_data_return_all->put('parametrs', $collection_data_parametrs);
        //

        /*  if(isset($collection_data_img))
              $collection_data_return_all->put('images', $collection_data_img);
          else
              $collection_data_return_all->put('images', '|'.$request->image.'|');

          if(isset($collection_data_parametrs))
              $collection_data_return_all->put('parametrs', $collection_data_parametrs);

          if(isset($collection_data_descr))
              $collection_data_return_all->put('about', $collection_data_descr);*/

        //  if(isset($collection_data_color))
        //  $collection_data_return_all->put('colors', $collection_data_color);

        //  return $collection_data_color;

        $categories = Category::where('parent_id', '!=', 0)->get();
        return view('admin.parser.productView', ['file' => $collection_data_return_all, 'categories' => $categories, 'get' => $get]);
    }
}
