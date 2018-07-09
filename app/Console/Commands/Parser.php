<?php

namespace App\Console\Commands;

use App\Models\Product_component;


use Illuminate\Console\Command;

use Sunra\PhpSimple\HtmlDomParser;

class Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle( )
    {

        $curl = new \Curl\Curl();

        $products =  \App\Models\Product::orderBy('id', 'ASC')->get();


        foreach ( $products as $key => $product ){

            echo $key . "\n";

            $prd = $curl -> get( $product -> link );

            echo  $product -> link . "\n";



            //спочатку подивимось чи продукт має компоненти

            $components = explode( "'#mainContainer',productId:'", $prd -> response ) ;

            if( count( $components ) == 2 ){

                $components = explode("',lang:'default'", $components[1] ) ;

                //якщо має, то запишемо на всякий випадок в базу

                if( count( $components ) == 2 ){

                    \App\Models\Product::whereId( $product -> id ) -> update( ['slug' => $components[0] ] ) ;

                    //повитягуємо самі компоненти

                    $res = $curl -> get( 'https://www.vox.pl/assets/infoJsons/' . $components[0] . '.json' );

                    $result = ( json_decode( $res -> response, true ) ) ;

                    //якщо такі компоненти є, то прив'яжемо їх в базу

                    if( is_array( $result ) ){

                        foreach ( $result['components'] as $key => $item ){

                            if( is_array( $item ) ){

                            foreach ( $item as $group ) {

                                $comp = \App\Models\Component::where ('name', 'like', $group['name'] ) -> where('component_group', $key ) -> first();

                                if ( $comp  == null )
                                   $id = \App\Models\Component::insertGetId(['name' => $group['name'], 'component_group' => $key ]);
                                else
                                    $id = $comp -> id;

                                if( \App\Models\Product_component::where('product_id', $product -> id ) -> where('component_id', $id) -> first() == null)
                                \App\Models\Product_component::insert( ['product_id' => $product -> id, 'component_id' => $id ]);

                                }

                            }

                        }

                        //тепер витягнемо всі зв'язки з продуктами і стягнемо ссилки на продукти

                        $pivot = \App\Models\Product_component::select('component_id')->where( 'product_id', $product -> id ) -> get() -> toArray();

                        $pivot = array_flatten( $pivot );

                        //повитягуємо ссилки на файли

                        $components = \App\Models\Component::whereIn( 'id', $pivot ) -> get();

                        $groups_g = array();

                        foreach ( $components as $cmp )
                            $groups_g[ $cmp -> component_group ][] = $cmp -> name;


                        foreach ( $groups_g as $key => $group ){

                            foreach ( $group as $item ){


                                //параметри, які треба відправити  https://www.vox.pl/server/getActualImage.php щоб отримати список всіх картинок

                                $params = [

                                    "id" => $components[0],
                                    "image" => "",
                                    "akcesoria" => false,
                                    "wozki"  => [],
                                    "size"   => "38.9,39.7,185.1",
                                    "userId" => null,
                                    "bigAreaCalculator" => null,
                                    "mediumAreaCalculator" => null,
                                    "smallAreaCalculator" => null,
                                    "legsHeight" => 9,
                                    "descriptions" => [
                                        [
                                            "key"   => "st-main-menu-1-pos",

                                            "value" =>"menu_select_body_color"

                                        ],
                                        [
                                            "key"   => "st-main-menu-2-pos",

                                            "value" => "menu_select_front_color"
                                        ],
                                        [
                                            "key"   => "st-main-menu-3-pos",

                                            "value" => "menu_select_legs"

                                        ],
                                        [

                                            "key"   => "st-main-menu-4-pos",

                                            "value" => "menu_select_handles_color"
                                        ],
                                        [
                                            "key"   => "st-main-menu-5-pos",

                                            "value" => "none"
                                        ]
                                    ],

                                    "simpleTalkResources" => [],

                                    "simpleCreator" => [  "currentViewState" => []

                                    ]
                                ];

                                $params[ $key ] = $item;


                                //створимо json з параметрами для картинок

                                //TODO

                                foreach ( $groups_g as $k => $compn ){

                                    if( $k != $key ){

                                        foreach ( $compn as $i ){

                                            $params[$k] = $i;

                                            echo $k . "________" . $i . "\n";



                                            //ссилка, куди треба кормити  список параметрів для різних кольорів

                                            // $pictures = $curl->post ('https://www.vox.pl/server/getActualImage.php', json_encode( ['data' => $params ] ));

                                        }
                                    }

                                }


                                echo   $key  . "==>" . $item .  "\n";


                            }

                        }
                        


                    }

                }

            } else {

                $html = HtmlDomParser::str_get_html( $prd -> response );


                if( $html ) {

                $images = array();

                foreach ( $html -> find('.product-full-img-block') as $item ){
                    if( $item -> src != false )
                    $images [] =  $item -> src ;
                }

                foreach ( $html -> find('.zoom-container') as $item )
                    $images [] =  $item -> getAttribute('data-zoom-img') ;


                if( count( $images ) > 0 )
                    \App\Models\Product::whereId( $product -> id ) -> update( ['images' => json_encode( $images ) ] ) ;

                }
            }


        }


    }

    public static  function categories()
    {

        $curl = new \Curl\Curl();

        $categories =  \App\Models\Category::all();

        foreach ( $categories as $key =>  $category ){

            echo $key . "\n";

            $res = $curl -> get( $category -> link );

            $html = HtmlDomParser::str_get_html( $res -> response );

            foreach ( $html -> find('.productContainer .productItem .image a') as $item ){

                if( \App\Models\Product::where('link' ,$item -> href ) -> first() == null )
                    \App\Models\Product::insert(['link' => 'https://www.vox.pl' . $item -> href ] ) ;
            }

        }



    }

}
