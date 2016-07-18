<?php 
namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = \App\Category::orderBy('created_at', 'desc')
						  ->paginate(10);

		$post_type = '類別總覽';


		$data = compact('posts', 'post_type');

    	return view('admin.category.index', $data);
	}

	public function getall()
	{
		$posts = \App\Category::orderBy('created_at', 'desc');
	
		return $posts;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.category.create');
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
            'name' => 'max:255', // 必填、在 articles 表中唯一、最大長度 255
        ]);
		$post = new Category();
		$post->name = $request->get('name');
		$post->created_at = date('Y-m-d H:i:s');
		$post->updated_at = date('Y-m-d H:i:s');

		//$post->id = $request->user()->id; // 獲取當前 Auth 系統中註冊的用戶，並將其 id 賦給 article 的 user_id 屬性

		 // 將數據保存到數據庫，通過判斷保存結果，控制頁面進行不同跳轉
        if ($post->save()) {
           return redirect()->route('category.index', $post->id)->with('success', '新增文章完成');
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
		$post = \App\Category::find($id);

		if (is_null($post)) {
			return redirect()->back()->with('message', '找不到該類別');
		}

	 	$data = compact('post');

	    return view('admin.category.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = \App\Category::find($id);

		if (is_null($post)) {
			return redirect()->back()->with('message', '找不到該文章');
		}

		$data = compact('post');

    	return view('admin.category.edit', $data);
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
            'name' => 'required|unique:category,name,'.$id.'|max:255',
        ]);
		$post = \App\Category::find($id);
		$post->name = $request->get('name');
		$post->updated_at = date('Y-m-d H:i:s');

		if($post->save()) {
            return redirect()->route('category.edit', $post->id)->with('success', '文章更新完成');
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
		\App\Category::find($id)->delete();

		return redirect()->route('category.index')->with('success', '文章刪除完成');
	}


}
