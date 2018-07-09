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
        $path = public_path('files/upload/');
        $xml = simplexml_load_file($path.'574753141509825508.xml');
        $countProducts = 0;
        $saveProduct =[];
        $saveCategory =[];
        //dd($xml);
        foreach ($xml as $xmlKey => $product){
           // dd($product);
           // print_r( self::getProduct($product));
            //  print('<b>'.$xmlKey.'</b> : <br />');
          //  if($countProducts == 9)
          //   dd($product);
            ////////////////////////get category ///////////////////

           //   $saveProduct['category']  = self::getCategory($product->kategoryzacja);
            ////////////////////end category ///////////////////////

            ////////////////////////get product ///////////////////
            foreach ($product->wersje as $wersjeAttrKey => $wersjeAttr){

                foreach ($wersjeAttr as $wersjeDataKey => $wersjeData){
                 //   dd($wersjeData);
                    //print('<b>- '.$wersjeDataKey.'</b> : <br />');

                    /////////////////colors/////////////////////////
                    foreach ($wersjeData->kolory as $colorAttrKey => $colorAttr) {
                     //   print('-- '.$wersjeAttrKey.' : <br />');
                    //    dd($colorAttr);
                        foreach ($colorAttr as $dataColorKey => $dataColor){
                            //print('--- '.$dataColor['nazwa_pl'].' : <br />');
                          //  print('--- '.$dataColor['url'].' : <br />');
                           // print('--- '.$dataColor['id_kolor'].' : <br />');
                       //     dd($dataColor);
                        }
                    }
                    /////////////////attr height width etc.../////////////////////////
                    foreach ($wersjeData->wymiary as $wymiaryAttrKey => $wymiaryAttr) {
                       //  print('-- '.$wymiaryAttrKey.' : <br />');
                        // dd($wersjeAttr);
                        foreach ($wymiaryAttr as $dataWymiaryKey => $wymiary){
                            //  print('--- '.$wymiary['nazwa'].' : <br />');
                             //  print('--- '.$wymiary['wartosc'].' : <br />');
                            //dd($wymiary);
                        }
                    }


                }

            }
            /////////////////attr color category /////////////////////////
            foreach ($product->prefiksy as $colorCategoryKey => $colorCategory) {
                //        print('-- '.$colorCategoryKey.' : <br />');
              //  dd($colorCategory);
                foreach ($colorCategory as $categoryColorDataKey => $categoryColorData){
                  //  print('--- '.$categoryColorData['id'].' : <br />');
                 //   print(''.$categoryColorData['nazwa'].' : <br />');
                  //  print('--- '.$categoryColorData['pozycja'].' : <br />');
                  //  dd($categoryColorData);
                }
            }
            /////////////////photos /////////////////////////
         //   $saveProduct['photos']  = self::getPhotos($product->zdjecia);
            /////////////////product data /////////////////////////
           /* foreach ($product->atrybuty as $dataProductKey => $dataProduct) {
                $i_data = 0;
                foreach ($dataProduct as $infoProduct){
                    if($i_data == 0)  $saveProduct['name'] = $infoProduct['wartosc'];
                    $i_data++;
                }
            }*/
          //  $saveProduct['attr']  = self::getAttributes($product->atrybuty);
            ////////////////////end category ///////////////////////
          /*  foreach ($product as $dataKey => $data){
               // print($dataKey.'<br />');
               // dd($data);
                foreach ($data as $infoKey => $info){
                  //  print($infoKey.'<br />');
                   // dd($info);
                        foreach ($info as $attrKey => $attr){
                      //      print($attrKey.'<br />');
                            //dd($attr);
                            foreach ($attr as $atrKey => $datailAtr){
                             //   dd($datailAtr);
                                foreach ($datailAtr as $itemKey => $item){
                                    print($item.'<br />');
                                }
                            }
                        }
                }

            }*/
            $countProducts++;
            if (array_key_exists( self::getCategory($product), $saveCategory)) {
                $saveCategory[] = self::getCategory($product);
            }

           //  break;
        }
        foreach ($saveCategory as $pr){
            echo $pr;
        }
       //dd($saveCategory);
        //return view('admin.parser.index');
    }
    public function uploadPost(Request $request)
    {
        $path = public_path('files/upload/');
        if (!File::exists($path))File::makeDirectory($path, $mode = 0777, true, true);

        if( isset($request->file))
        {
            $Name = rand(0,99999999).time().'.'.$request->file->getClientOriginalExtension();

            if($request->file && $request->file->move($path, $Name))
            {
                $xml = simplexml_load_file($path.''.$Name);
                print_r($xml[0]);
            }
        }
    }

    public function getProduct($product)
    {
        dd($product);
            dd( self::getAttributes($product));
    }

    public function getId($product)
    {
        return $product['id'];
    }
    public function getStatus($product)
    {
        return $product['status'];
    }
    public function getCategory($data)
    {
        foreach ($data->kategoryzacja as $categoryKeyAttr => $categoryAttr){
            foreach ($categoryAttr as $category){
                echo $category['nazwa_pl'];
            }

        }
    }
    public function getPhotos($data)
    {
        foreach ($data->zdjecia as $photodataKey => $photodata) {
            $baseUrl = $photodata['baseHref'];
            $arrayPhotos = array();
            foreach ($photodata as $photo){
                array_push($arrayPhotos, $photo);
                // array_push($arrayPhotos, $baseUrl.$photo['path']);
            }
        }
            return $arrayPhotos;
    }
    public function getAttributes($data)
    {
        $arrayAttr = array();
        foreach ($data->atrybuty as $wymiaryAttrKey => $wymiaryAttr) {
            foreach ($wymiaryAttr as $dataWymiaryKey => $wymiary){
                $arrayAttr =  $wymiaryAttr;
            }
          //  $arrayAttr['attr'] =  $wymiaryAttr;
        }
        return $arrayAttr;
    }


}
