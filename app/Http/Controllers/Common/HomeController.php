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
		//圖片輪播
		$manager = new ImageManager();
		$images_filename =array();
		$images_filename_array =glob(DIR_IMAGE.'images/*.*');//需要絕對座標
		
		

		foreach ($images_filename_array as $key => $value) {
			$filename = basename($value);
			//$new_img = $manager->make($value)->resize(287, 412);
			//$new_img->save();
			
			if (is_numeric(substr($filename,0,strpos($filename,"_")))) {
				$pixv = "http://www.pixiv.net/member_illust.php?mode=medium&illust_id=".substr($filename,0,strpos($filename,"_"));
			}else{
				$pixv =null;
			}

			$img = new \App\Model\Tool\Image;
			//$images_filename[$key] = $img->resize('images/'.$filename,287,412);

			$images_filename[$key] =array(
					"filename"	=> $filename,
					"url"		=> $img->resize('images/'.$filename,287,412),
					"pixv"		=> $pixv
				);

		}
		//var_dump($images_filename);
		//test case

		
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
