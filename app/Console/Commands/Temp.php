<?php

namespace App\Console\Commands;

use App\Goods;
use App\Goods_color_photo;
use App\Goods_description;
use Illuminate\Console\Command;

class Temp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movedb';

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
    public function handle()
    {
        /*$main_db = \DB::connection('mysql');
        $old_db = \DB::connection('mysql_old');

        $old_products = $old_db->table('products')->get()->toArray();

        array_walk($old_products, function ($product){
            $new_product = new Goods();
            $new_product->id = $product->id;
            $new_product->price = 0;
            $new_product->subcategory_id = 0;
            $new_product->parse_url = $product->link;
            $new_product->save();

            $color_photo = new Goods_color_photo();
            $color_photo->file = json_decode($product->images);
            $new_product->color_photo()->save($color_photo);
        });

        echo "done.";*/
        foreach (Goods::all() as $good) {
            $desc = new Goods_description();
            $desc->name = 'name';
            $desc->slug = 'slug';
            $desc->language = 'ru';
            $desc->description = 'description';
            $good->description_ru()->save($desc);

            $desc = new Goods_description();
            $desc->name = 'name';
            $desc->slug = 'slug';
            $desc->language = 'ua';
            $desc->description = 'description';
            $good->description_ua()->save($desc);
        }
    }
}
