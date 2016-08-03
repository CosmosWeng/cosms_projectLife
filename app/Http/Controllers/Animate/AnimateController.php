<?php

namespace App\Http\Controllers\Animate;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Animate_list as Animate_list;

class AnimateController extends Controller
{
    public function index(Request $request)
    {
    	 if ($request->isMethod('get')) {
    	 	if (isset($request->year)){
    	 		$year = $request->year;
    	 	}else{
    	 		$year = null;
    	 	}
    	 }

    	$categories = Animate_list::select('key_year')->distinct()->orderBy('key_year','desc')->get()->toArray();

    	$posts = Animate_list::where('key_year',$year)
            ->orderBy('key_mon', 'DESC')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
        //$categories_total = Animate_list::where('key_year',$year)->count();

        //var_dump($posts);


    	$data = compact('categories','posts','year');
    	return View('animate.class.index',$data);
    }

    public function getdata(Request $request){
        if (isset($request->id)) {
            # code...
            $posts = Animate_list::where('id',$request->id)
            ->get()
            ->toArray();
            return json_encode($posts);
        }
    }

    
}
