<?php 
namespace App\Http\Controllers\Information;

use App\Http\Requests\ContactStoreRequest;
use App\Http\Controllers\Controller;

use App\Message as Message;
class ContactsController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('contacts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ContactStoreRequest $request)
	{
		//$contact = Message::create($request->all());

		$post = new Message();
        $post->caid ='0';
        $post->name = $request->get('name');
        $post->email = $request->get('email');
        $post->description = $request->get('message');
        $post->status = '1';
        $post->type ='0';

        if ($post->save()) {
           return redirect()->route('contacts.create')->with('success', '謝謝您的留言');
        } else {
            // 保存失敗，跳回來路頁面，保留用戶的輸入，並給出提示
            return redirect()->back()->withInput()->withErrors('留言失敗！');
        }


		
	}

}
