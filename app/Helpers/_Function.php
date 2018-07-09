<?php
/**
 * Created by PhpStorm.
 * User: france
 * Date: 25.02.17
 * Time: 22:24
 */
//namespace App\Helpers;
use \App\User;
use \App\Category_description;
use \App\Goods_description;
use \App\Interior_description;
use \App\Collection;
use \App\Goods;


class _Function {

	public static function retranslit($in)
	{
		$trans1= array("'",'`',',',' ',"Ё","Ж","Ч","Ш","Щ","Э","Ю","Я","ё","ж","ч","ш","щ","э","ю","я","А","Б","В","Г","Д","Е","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ь","Ы","а","б","в","г","д","е","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ь","ы","і","є","ґ");

		$trans2= array('_','_','_','_',"JO","ZH","CH","SH","SCH","Je","Jy","Ja","jo","zh","ch","sh","sch","je","jy","ja","A","B","V","G","D","E","Z","I","J","K","L","M","N","O","P","R","S","T","U","F","H","C","","Y","a","b","v","g","d","e","z","i","j","k","l","m","n","o","p","r","s","t","u","f","h","c","","y","i","e","g");

		return str_replace($trans1,$trans2,$in);

	}
	static public function slugify($text)
	{
		$text = _Function::retranslit($text);
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}
	static public function seo_friendly_url($string){
		$string = str_replace(array('[\', \']'), '', $string);
		$string = preg_replace('/\[.*\]/U', '', $string);
		$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
		$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
		return strtolower(trim($string, '-'));
	}
	public static function user($id)
	{
		$id = intval($id);
		$user = User::find($id);
		if($user)
		{
			echo $user->name;
			return '';
		}
		echo 'No login';
	}
	public static function timestemp($time)
	{
		if( _Function::validateDate($time) )
		{

			$year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
			$month = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->month;
			$day = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->day;

			return $year.'-'.$month.'-'.$day;
		}

	}

	static function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
	public static function getSlug($name)
	{
		$newSlug =  _Function::slugify($name);
		$findSlug_category = Category_description::where('slug' , $newSlug)->first();
		$findSlug_goods = Goods_description::where('slug' , $newSlug)->first();
		$findSlug_interiors = Interior_description::where('slug' , $newSlug)->first();
		$findSlug_collection = Collection::where('slug' , $newSlug)->first();

		if($findSlug_category || $findSlug_goods || $findSlug_interiors || $findSlug_collection)
			return _Function::slugify($name.'-'.rand(1,1000));

		return $newSlug;
	}
	public static function checkSlug($name , $id , $type)
	{
		//$newSlug =  _Function::slugify($name);
		if($type == 'interior')
		{
			$findSlug_category = Category_description::where('slug' , $name)->first();
			$findSlug_goods = Goods_description::where('slug' , $name)->first();
			$findSlug_interiors = Interior_description::where('slug' , $name)->where('int_id' , '!=' , $id)->first();
		}
		
		if($findSlug_category || $findSlug_goods || $findSlug_interiors)
			return true;

		return false;
	}
	public static function text($text)
	{
		echo '$'.$text.'_'.strtolower(\App::getLocale());
	}
	public static function ProductCover($id){
		$product = Goods::find($id);
		if(!$product || empty($product->cover))echo '/img/no-image-available.png';
		else
			echo '/files/image/catalog/'.$product->subcategory_id.'/'.$product->id.'/preview/'.$product->cover;
	}
	public static function ProductBackCover($id){
		$product = Goods::find($id);
		if(!$product || empty($product->album_cover))echo '';
		else
			echo '/files/image/catalog/'.$product->subcategory_id.'/'.$product->id.'/cover/'.$product->album_cover;
	}
	public static function ProductName($id){
		$product = Goods::find($id);
		if(!$product)
			echo 'No name';
		else
			echo $product->description->name;
	}
	public static function CategoryName($id){
		$category = \App\Category::find($id);
		if(!$category)
			echo 'No name';
		else
			echo $category->description->name;
	}
	public static function CategoryCover($id){
		$category = \App\Category::find($id);
		if(!$category)
			echo '';
		else
			echo '/files/image/catalog/'.$category->id.'/'.$category->cover;

	}
	public static function CollectionName($id){
		$collection = Collection::find($id);
		$lang = 'name_'.App::getLocale();
		if(!$collection)echo 'No name';
		else
			echo $collection->$lang;
	}
	public static function CollectionDescription($id){
		$collection = Collection::find($id);
		$lang = 'description_'.App::getLocale();
		if(!$collection)echo 'No name';
		else
			echo $collection->$lang;
	}
	public static function CollectionDescriptionCover($id){
		$collection = Collection::find($id);
		if(!$collection)echo 'err_photo';
		else
			echo '/files/collection/cover/'.$collection->id.'/'.$collection->img;
	}
	public static function CollectionCover($id){
		$collection = Collection::find($id);
		if(!$collection)echo 'err_photo';
		else
			echo '/files/collection/avatar/'.$collection->id.'/'.$collection->avatar;
	}
	public static function CollectionSliderDescription($id){
		$Collection_data = \App\Collection_data::find($id);
		$lang = 'description_'.App::getLocale();
		if(!$Collection_data)echo 'No description';
		else
			echo $Collection_data->$lang;
	}


}

?>