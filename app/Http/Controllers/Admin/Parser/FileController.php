<?php

namespace App\Http\Controllers\Admin\Parser;

use App\Category_description;
use App\Colors_category;
use App\Goods;
use App\Goods_color;
use App\Goods_color_photo;
use App\Goods_description;
use App\Http\Controllers\Controller;
use File, Image, Cookie;

class FileController extends Controller
{
    /*
     * id new  product
     */
    private $good_id = null;

    /*
     * good->subcategory_id
     */
    private $good_subcategory_id = null;

    /*
     * var $category
     */
    private $category = null;

    /*
     * Images
     */
    private $images = null;

    /*
     * Product name
     */
    private $name = null;

    /*sud
     * Url parsing file
     */
    private $parse_url = null;

    /*
     * Color category id
     */
    private $color_category_id;
    private $depth;
    private $height;
    /**
     *
     */
    private $width;

    private function run($request)
    {
        $this->category = $request['category'];
        $this->images = $request['images'];
        $this->name = $request['name_ru'];
        $this->parse_url = $request['parse_url'];
        $this->depth = $request['depth'];
        $this->height = $request['height'];
        $this->width = $request['width'];

        $this->good();
        $this->description();
        $this->colorCategory();
        $this->uploadPhoto();

        if (Cookie::get('admin_category_parser'))
            Cookie::forget('admin_category_parser');

        Cookie::queue('admin_category_parser', $this->category, 6000);

        return 'success';
    }

    /*
     * Create product
     */
    private function good()
    {
        $goods = new Goods();
        $goods->subcategory_id = $this->category;
        $goods->parse_url = '/' . $this->parse_url;
        $goods->depth = $this->depth;
        $goods->height = $this->height;
        $goods->width = $this->width;
        $goods->price = 0;
        if (!$goods->save()) {
            return 'Failed to save to product';
        }
        $this->good_id = $goods->id;
        $this->good_subcategory_id = $goods->subcategory_id;
    }

    /*
     * create description
     */
    private function description()
    {
        $new_description = new Goods_description;
        $new_description->name = $this->name;
        $new_description->language = 'ru';
        $new_description->slug = $this->getSlug('product-' . time() . rand(1, 99999));
        $new_description->good_id = $this->good_id;
        if (!$new_description->save()) {
            return 'Failed to save description ru';
        }

        $new_description = new Goods_description;
        $new_description->name = $this->name;
        $new_description->language = 'ua';
        $new_description->slug = $this->getSlug('product-' . time() . rand(1, 99999));
        $new_description->good_id = $this->good_id;
        if (!$new_description->save()) {
            return 'Failed to save description ua';
        }
    }

    /*
     * Create color category
     */
    private function colorCategory()
    {
        $category = new Colors_category;
        $category->good_id = $this->good_id;
        $category->name_ru = 'Картинки';
        $category->name_ua = 'Картинки';
        if (!$category->save()) {
            return 'No save category color';
        }

        $this->color_category_id = $category->id;
    }

    private function uploadPhoto()
    {
        if (!$this->images) {
            return 'No photos';
        }

        $path = public_path('files/image/catalog/' . $this->good_subcategory_id . '/' . $this->good_id . '/colors/photo');
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $q_photo = explode("||", substr($this->images, 1, -1));
        $count_photo = count($q_photo);

        if ($count_photo < 1) {
            return 'No photos';
        }
        for ($a = 0; $a < $count_photo; $a++) {
            $file_name = rand(0, 1000) . '_' . time() . '.jpg';
            $url = $q_photo[$a];
            $path = 'files/image/catalog/' . $this->good_subcategory_id . '/' . $this->good_id . '/colors/photo/' . $file_name;
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

            $color_new = new Goods_color;
            $color_new->category_id = $this->color_category_id;
            $color_new->name_ru = '-';
            $color_new->name_ua = '-';
            $color_new->file = $file_name;
            $color_new->save();

            $color_photo_new = new Goods_color_photo;
            $color_photo_new->good_id = $this->good_id;
            $color_photo_new->file = $file_name;
            $color_photo_new->price = 0;
            $color_photo_new->attr = "[\"$this->color_category_id:$color_new->id\"]";
            $color_photo_new->save();

            $this->createColorPhoto($path, $file_name);
        }

    }

    /*
     * create mini photo
     */
    private function createColorPhoto($path, $file_name)
    {
        $path_save = public_path('files/image/catalog/' . $this->good_subcategory_id . '/' . $this->good_id . '/colors');
        $img = Image::make($path);
        $img->save($path_save . '/' . $file_name);
    }

    private function getSlug($name)
    {
        $name = str_replace(" ", "-", $name);
        $newSlug = \_Function::retranslit($name);
        $findSlug = Category_description::where('slug', $newSlug)->first();
        $findSlug_goods = Goods_description::where('slug', $newSlug)->first();
        if ($findSlug || $findSlug_goods) return $this->getSlug($name . '-' . rand(1, 1000));
        return $newSlug;
    }

    public function __invoke($request)
    {
        return $this->run($request);
    }
}
