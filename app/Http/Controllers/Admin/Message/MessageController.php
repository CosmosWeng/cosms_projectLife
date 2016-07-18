<?php

namespace App\Http\Controllers\Admin\Message;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //
    public function index()
    {
    	
    }

    public function getlist()
    {
    	$posts = array();


		$data = compact('posts', 'post_type');
    	return view('admin.message.lists',$data);
    }

     public function getform()
    {
    	return view('admin.message.form');
    }


}
