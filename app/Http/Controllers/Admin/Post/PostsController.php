<?php 
namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post ;
use App\Category;
use App\Message as Message;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category=null)
	{
		$post_type = '文章總覽';

		if (!isset($_GET['caid'])) {
			$posts = \App\Post::leftJoin('category','article.category','=','category.id')
						->select('article.*','category.name as category')
						->orderBy('created_at', 'desc')
						->paginate(10);
		}else{
			$posts = \App\Post::leftJoin('category','article.category','=','category.id')
						->select('article.*','category.name as category')
						->where('category','=',$_GET['caid'])
						->orderBy('created_at', 'desc')
						->paginate(10);
		}

		$categries = \App\Category::get();


		$data = compact('posts', 'post_type','categries');
    	return view('article.index', $data);
	}

	public function getCategory()
	{
		$categries = \App\Category::orderBy('created_at', 'desc');

		$categriestitle = '類別目錄';


		$data = compact('categries', 'categries_title');

    	return view('module.categorylist', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('article.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// 數據驗證
        $this->validate($request, [
            'title' => 'max:255', // 必填、在 articles 表中唯一、最大長度 255
            'description' => 'required', // 必填
        ]);
		$post = new Post();
		$post->title = $request->get('title');
		$post->category = $request->get('category');
		$post->description = $request->get('description');
		$post->created_at = date('Y-m-d H:i:s');
		$post->updated_at = date('Y-m-d H:i:s');

		//$post->id = $request->user()->id; // 獲取當前 Auth 系統中註冊的用戶，並將其 id 賦給 article 的 user_id 屬性

		 // 將數據保存到數據庫，通過判斷保存結果，控制頁面進行不同跳轉
        if ($post->save()) {
           return redirect()->route('article.index', $post->id)->with('success', '新增文章完成');
        } else {
            // 保存失敗，跳回來路頁面，保留用戶的輸入，並給出提示
            return redirect()->back()->withInput()->withErrors('保存失敗！');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

	public function show($id)
	{
		$category_info = \App\Category::orderBy('created_at', 'desc')->get();

		$post = \App\Post::find($id);

		if (is_null($post)) {
			return redirect()->back()->with('message', '找不到該文章');
		}

		//var_dump($post);
		$replies = $this->reply($id);

	 	$data = compact('category_info','post','replies');

	    return view('article.show', $data);
	}

	public function lists()
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
    	return view('article.list',$data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = \App\Post::find($id);


		if (is_null($post)) {
			return redirect()->back()->with('message', '找不到該文章');
		}


		$category_info = \App\Category::all();
/*
		foreach ($$category_info as $key => $value) {
			var_dump($key .':'. $value);
		}
*/


		$data = compact('post','category_info');

    	return view('article.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request, [
            'title' => 'required|unique:article,title,'.$id.'|max:255',
            'description' => 'required', 
        ]);
		$post = \App\Post::find($id);
		$post->title = $request->get('title');
		$post->category = $request->get('category');
		$post->description = $request->get('description');
		$post->updated_at = date('Y-m-d H:i:s');

		if($post->save()) {
            return redirect()->route('article.edit', $post->id)->with('success', '文章更新完成');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\Post::find($id)->delete();

		return redirect()->route('article.index')->with('success', '文章刪除完成');
	}



	public function random()
	{
		$post = \App\Post::all()->random();

		if (is_null($post)) {
			return redirect()->back()->with('message', '目前沒有文章');
		}

	 	$data = compact('post');

	    return view('article.show', $data);
	}

	public function reply($id)
	{
		$replies = Message::where('caid','=',$id)
			->orderBy('created_at', 'desc')
			->get();

		return $replies;
	}

	public function comment($id, Request $request)
	{
		$post = \App\Post::findOrFail($id);
		$comment = \App\Comment::create($request->all());

		$post->comments()->save($comment);

		return redirect()->route('article.show', $post->id)->with('success', '回覆留言完成');
	}

}
