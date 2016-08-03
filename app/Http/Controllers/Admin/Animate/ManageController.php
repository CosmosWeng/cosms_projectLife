<?php

namespace App\Http\Controllers\Admin\Animate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Animate_list as Animate_list;
use App\Libraries\Pagination as Pagination;

include(ROOT_PATH . 'app/Libraries/simple_html_dom.php');

class ManageController extends Controller
{
    //
    public function index(Request $request)
    {

      //GET參數偵測 start
      if (isset($request->page)) {
        $page =$request->page;
      } else {
        $page = 1;
      }
      //GET參數偵測 end

      $list_array = array();
      $page_array = array();
      if ($request->isMethod('get')) {
          $url = $request->html;
            if (strpos($url,'www.animen.com.tw')) {
               $re_array = $this->analysis($url);
               $check_exist = Animate_list::select('key_year')->where('key_year','=',$re_array['year'])->where('key_mon','=',$re_array['mon'])->get();
               if (empty($test)) {
                 $this->insert_table($re_array['data_array'],$re_array['year'],$re_array['mon']);
                 return redirect()->route('animate.index')->with('success', '匯入完成');
               }
            }
            if (isset($request->list)){
              $list_array = $request->list;
            }
      }

      $category = Animate_list::select('key_year')->distinct()->get()->toArray();
       $str ='';
       $count = 0;
       foreach ($list_array  as $key => $value) {
        if ($count==0) {
          $str .= ' key_year ="'.$key.'" and ('; 
        }else{
          $str .= ' or key_year ="'.$key.'" and ('; 
        }
         foreach ($value as $key => $mon) {
          if ($key ==0) {
            $str .= ' key_mon ="'.$mon.'"';
          }else{
            $str .= ' or key_mon ="'.$mon.'"';
          }
         }
          $str .= ')'; 
          $count++;
       }
       $data = array(
//          'sort'            => $sort,
//          'order'           => $order,
          'start'           => ($page - 1) * 20,
          'limit'           => 20
        );

       if (!empty($str)) {
        $posts = Animate_list::whereRaw($str)
            ->orderBy('key_year', 'DESC')
            ->orderBy('key_mon', 'DESC')
            ->orderBy('created_at', 'desc')
            ->skip($data['start'])
            ->take($data['limit'])
            ->get();
        $post_total = Animate_list::whereRaw($str)->count();
       }else{
        $post_total = 0;
       }

      $url ='?page={page}';
      if (isset($request->list)){
        foreach ($list_array as $la_key => $la_value) {
          foreach ($la_value as $key => $value) {
            $url .= '&list['.$la_key.'][]=' . $value;
          }
        }
      }

      $pagination = new Pagination();
      $pagination->total = $post_total;
      $pagination->page = $page;
      $pagination->limit = '20';
      //$pagination->text = $this->language->get('text_pagination');
      $pagination->url = route('animate.index').$url ;//$this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
      $paginations = $pagination->render();
/*
      foreach($category as $key => $ca){
         var_dump($ca['key_year']);
      }
       var_dump($list_array);
*/
        $data = compact('posts','category','list_array','paginations');
      	return View('admin.animate_manage.list',$data);
      }

    public function insert_table($array,$year,$mon)
    {
      foreach ($array as $key => $value) {
        $broadcast_date = substr($value[1],strripos($value[1],"2016"));
        $broadcast_date =preg_replace('/\s(?=)/', '', trim($broadcast_date));
        $broadcast_date .= '('; 
        $left = strripos($broadcast_date,"（");
        if (empty($left)) {
          $left = strripos($broadcast_date,"(");
        }
      
        $broadcast_date = (substr($broadcast_date,0,$left));
        
        $broadcast_date_temp = trim(preg_replace('/[^0-9 ]/','',$broadcast_date));


        if (strlen($broadcast_date_temp)>6) {
          $broadcast_date = trim(preg_replace('/[^0-9 ]/','',$broadcast_date));
          $temp = substr($broadcast_date,4);
          if (strlen($temp)==3) {
            $temp = substr($temp,0,2) . '0' .  substr($temp,2) ;
          }
          $broadcast_date = substr($broadcast_date,0,4).$temp;
          $broadcast_date = date('Y-m-d',strtotime($broadcast_date));
        }
      
        $name_tw = trim(str_replace('&nbsp;','',$value[0]));
        $name_jp = trim(str_replace('&nbsp;','',$value[1]));
        $temp =  explode($year,$name_jp);
        $name_jp = $temp[0];

        if (!empty($value[2])) {
          $image =$value[2];
          //$image = $this->saveimage($value[2]);
        }else{
          $image ='';
        }
        
        $pt_list = trim($value[3]);
        $cv_list = trim($value[4]);

      
        $post = new Animate_list();
        $post->key_year = $year;
        $post->key_mon = $mon;
        $post->name_tw  = $name_tw;
        $post->name_jp  = $name_jp;

        $post->image    = $image;
        $post->description = "";
        $post->pt_list  = $pt_list;
        $post->cv_list  = $cv_list;
        $post->broadcast_date = $broadcast_date;

        $post->created_at = date('Y-m-d H:i:s');
        $post->updated_at = date('Y-m-d H:i:s');

        $post->save();
      
      }
    }

    public function saveimage($file)
    {
      $file = "http://www.animen.com.tw".$file;
      $type = getimagesize($file); //取得图片的大小，类型等
      $file_content = base64_encode( file_get_contents( $file ) );
      switch ( $type[2] ) { //判读图片类型
          case 1:
              $img_type = "gif";
              break;
          case 2:
              $img_type = "jpg";
              break;
          case 3:
              $img_type = "png";
              break;
      }
      $img = 'data:image/' . $img_type . ';base64,' . $file_content; //合成图片的base64编码
      return $img ;
    }

     public function analysis($url)
    {
    	
    	//$html = file_get_html('http://www.animen.com.tw/NewsArea/NewsItemDetail?NewsId=15445&categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8&realCategoryId=1&subCategoryId=5');
      //$html = file_get_html('http://www.animen.com.tw/NewsArea/NewsItemDetail?NewsId=14444&categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8&realCategoryId=1&subCategoryId=5');
      $html = file_get_html($url);

    	/**取得年份月份**/
    	$es = $html->find('.news-title',0);
   		$date = preg_replace("#[^A-z0-9]#","",trim($es->plaintext));

   		$d=strtotime($date."01");
    	//var_dump(date("Y-m",$d));
      $year = substr($date, 0,4);
      $mon  = substr($date, 4);

		/**取得第二張表 為了詳細內容**/
   	  $res=$html->find("table",1);
      $res_tr = $res->find('tr');

      $data_array = array();
      $res_tr = array_chunk($res_tr,2);

      for ($i=0; $i < count($res_tr); $i++) { 
        if (!isset($res_tr[$i][0]->first_child()->plaintext)) {
           break;
         }
         $first_data = $res_tr[$i][0]->first_child()->plaintext;
         $data = explode("\n",$first_data);

        if (!isset($res_tr[$i][1]->find('img',0)->attr)) {
           break;
         }
         $second_data = $res_tr[$i][1]->find('img',0)->attr;
        if (isset($second_data['src']) && !empty($second_data['src'])) {
           array_push($data,$second_data['src']);
         }else{
           array_push($data,$second_data['data-original']);
         }

        if (!isset($res_tr[$i][1]->find('td',1)->children(0)->plaintext)) {
           break;
         }
          $three_data = $res_tr[$i][1]->find('td',1)->children(0)->plaintext;

        if (!isset($res_tr[$i][1]->find('td',1)->children(1)->plaintext)) {
           break;
         }
          $four_data = $res_tr[$i][1]->find('td',1)->children(1)->plaintext;

          array_push($data,$three_data);
          array_push($data,$four_data);
          array_push($data_array,$data);
      }

		  $html->clear();
		
      $data = compact('data_array','year','mon');

		 return $data ;
    }

    public function getform($id)
    {
        $post = Animate_list::find($id);

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

      return view('admin.animate_manage.form',$data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'key_year' => 'required',
            'key_mon' => 'required',
            'name_tw' => 'required',
        ]);

        $post = Animate_list::find($id);
        $post->key_year = $request->get('key_year');
        $post->key_mon  = $request->get('key_mon');
        $post->name_tw  = $request->get('name_tw');
        $post->name_jp  = $request->get('name_jp');
        $post->image    = $request->get('image');
        $post->description  = $request->get('description');
        $post->pt_list  = $request->get('pt_list');
        $post->cv_list  = $request->get('cv_list');

        $post->broadcast_date = $request->get('broadcast_date');

        if($post->save()) {
            return redirect()->route('animate.edit', $post->id)->with('success', '更新完成');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        Animate_list::find($id)->delete();

        return redirect()->route('animate.index')->with('success', '刪除完成');
    }



}