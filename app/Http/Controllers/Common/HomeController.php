<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;



// 導入 Intervention Image Manager Class
use Intervention\Image\ImageManager;

use App\Category;

use App\Post;

class HomeController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function index()
	{	
		$manager = new ImageManager();
		$images_filename =array();
		$images_filename_array =glob(realpath(base_path('public\img')).'\images\*.*');
		//var_dump(config('view.dir_path'));
		//var_dump($images_filename);

		foreach ($images_filename_array as $key => $value) {
			//var_dump($value);
			$filename = basename($value);
			$new_img = $manager->make($value)->resize(287, 412);
			$new_img->save();
			//var_dump($new_img);
			$images_filename[$key] = $filename;
		}
		//var_dump($images_filename);
		/*
		foreach ($images_filename as $key => $value) {
			# code...
			//var_dump($value);
			var_dump($value->response('jpg'));
		}
*/
		$data = compact('images_filename');


    	return view('common.index',$data);
	}


}
