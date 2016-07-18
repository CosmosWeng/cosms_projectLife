<?php

namespace App\Http\Controllers\Admin\Message;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Message as Message;

class MessageController extends Controller
{
    //
    public function index()
    {
    	
    }

    public function getlist()
    {
    
        $posts = Message::orderBy('created_at', 'desc')
                        ->paginate(10);

        //var_dump($posts);

		$data = compact('posts');
    	return view('admin.message.lists',$data);
    }

     public function getform($id)
    {
        $post = Message::find($id);

        if (is_null($post)) {
            return redirect()->back()->with('message', '找不到該留言');
        }
/*
        $category_info = \App\Category::all();
        foreach ($$category_info as $key => $value) {
            var_dump($key .':'. $value);
        }
*/
        $data = compact('post');

    	return view('admin.message.form',$data);
    }

    public function store(Request $request)
    {
        // 數據驗證
        $this->validate($request, [
            'caid' => 'required', // 必填、在 articles 表中唯一、最大長度 255
            'description' => 'required', // 必填
            'name' => 'required', // 必填
        ]);
        
        $post = new Message();
        $post->caid = $request->get('caid');
        $post->name = $request->get('name');
        $post->description = $request->get('description');
        $post->status = '1';
        $post->type ='1';
        
        //$post->id = $request->user()->id; // 獲取當前 Auth 系統中註冊的用戶，並將其 id 賦給 article 的 user_id 屬性

         // 將數據保存到數據庫，通過判斷保存結果，控制頁面進行不同跳轉
        if ($post->save()) {
           return redirect()->route('article.detail', $request->get('caid'))->with('success', '新增留言完成');
        } else {
            // 保存失敗，跳回來路頁面，保留用戶的輸入，並給出提示
            return redirect()->back()->withInput()->withErrors('保存失敗！');
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'reply' => 'max:255', 
        ]);

        $post = Message::find($id);
        $post->status = $request->get('status');
        $post->reply = $request->get('reply');
        $post->updated_at = date('Y-m-d H:i:s');

        if($post->save()) {
            return redirect()->route('message.edit', $post->id)->with('success', '回覆完成');
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
        Message::find($id)->delete();

        return redirect()->route('message.index')->with('success', '留言刪除完成');
    }


}
