<?php

namespace App\Http\Controllers\Animate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AnimatelessionController extends Controller
{
    //
    public function index()
    {
    	return View('animate.class.lession');
    }
}
