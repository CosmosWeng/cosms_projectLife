<?php 

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\Category;

use App\Post;

class HomeController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function index()
	{	
		$category_info = \App\Category::orderBy('created_at', 'desc')->get();


		if (!isset($_GET['caid'])) {
			$article_info = \App\Post::leftJoin('category','article.category','=','category.id')
						->select('article.*','category.name as category')
						->orderBy('created_at', 'desc')
						->paginate(10);
		}else{
		
			$article_info = \App\Post::leftJoin('category','article.category','=','category.id')
						->select('article.*','category.name as category')
						->where('category','=',$_GET['caid'])
						->orderBy('created_at', 'desc')
						->paginate(10);
		}


						 


		$data = compact('category_info','article_info');


    	return view('common.index',$data);
	}


}
