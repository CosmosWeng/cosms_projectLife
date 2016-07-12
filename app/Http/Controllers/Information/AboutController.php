<?php 
namespace App\Http\Controllers\Information;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller {

	public function index()
	{
		return view('information.about');
	}

}
