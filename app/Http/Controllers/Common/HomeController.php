<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;



// 導入 Intervention Image Manager Class
use Intervention\Image\ImageManager;

use App\Category;

use App\Post as Post;

class HomeController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function index()
	{	
		//test case
		/*
		$posts =  Post::select('id')->get();
		foreach ($posts as $key => $value) {
			# code...
			var_dump($key .":". $value);
		}
		*/
		
		//圖片輪播
		$manager = new ImageManager();
		$images_filename =array();
		
		if (!strpos($_SERVER['HTTP_HOST'],"localhost")) {
			$images_filename_array =glob(realpath(base_path('public')).'/img/images/*.*');
		}else{
			$images_filename_array =glob('img\images\*.*');//需要絕對座標
		}
		

		foreach ($images_filename_array as $key => $value) {
			//var_dump($value);
			$filename = basename($value);
			$new_img = $manager->make($value)->resize(287, 412);
			$new_img->save();
			//var_dump($new_img);
			$images_filename[$key] = $filename;
		}

		
		//讀取更新日誌
		$file = fopen("update_log.txt","r");
		$txt_log ='';
		while (! feof ($file))
		  {
		  $txt_log .=  fgets($file). "<br>";
		  }
		fclose($file);



		$data = compact('images_filename','txt_log');
    	return view('common.index',$data);
	}


}
