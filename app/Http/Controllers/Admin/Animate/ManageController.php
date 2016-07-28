<?php

namespace App\Http\Controllers\Admin\Animate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Animate_list as Animate_list;
include(ROOT_PATH . 'app/Libraries/simple_html_dom.php');

class ManageController extends Controller
{
    //
    public function index(Request $request)
    {
      if ($request->isMethod('post')) {
           $url = $request->input('html');
            if (strpos($url,'www.animen.com.tw')) {
              //$html = file_get_html($url);
               $re_array = $this->analysis($url);
               $check_exist = Animate_list::select('key_year')->where('key_year','=',$re_array['year'])->get();
               if (empty($test)) {
                 $this->insert_table($re_array['data_array'],$re_array['year']);
               }

            }
      }
    	return View('admin.animate_manage.list');
    }

    public function insert_table($array,$year)
    {
      //var_dump($array);
      foreach ($array as $key => $value) {
        $broadcast_date = substr($value[1],strripos($value[1],"2016"));
        $broadcast_date =preg_replace('/\s(?=)/', '', trim($broadcast_date));
        $left = strripos($broadcast_date,"（");
        if (empty($left)) {
          $left = strripos($broadcast_date,"(");
        }
        $broadcast_date = rtrim (substr($broadcast_date,0,$left),"　");
        //var_dump($broadcast_date);
        $name_tw = trim(str_replace('&nbsp;','',$value[0]));
        
        
        $name_jp = trim(str_replace('&nbsp;','',$value[1]));
        $temp =  explode($year,$name_jp);
        $name_jp = $temp[0];

        if (!empty($value[2])) {
          $image = $this->saveimage($value[2]);
        }
        
        $pt_list = trim($value[3]);
        $cv_list = trim($value[4]);

      
        $post = new Animate_list();
        $post->key_year = $year;
        $post->name_tw  = $name_tw;
        $post->name_jp  = $name_jp;

        $post->image    = $image;
        //$post->description = "";
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
      $year = date("Y",$d);

  //  		/**取得第一張表 僅有 名稱**/
  //   	$res=$html->find("table",0);
		// $res=$res->find('td a');
		
		// foreach ($res as $key => $value) {
		// 	//var_dump($value->attr['href']);
		// 	//$arrayName[$key]['href'] =$value->attr['href'];
		// 	//$arrayName[$key]['style'] =isset($value->attr['style'])?$value->attr['style']:"";
			
		// 		$arrayName[$value->attr['href']]=array(
		// 			'style'=> isset($value->attr['style'])?$value->attr['style']:"",
		// 			);
					
		// }
		// //var_dump($arrayName);



		/**取得第二張表 為了詳細內容**/
   	  $res=$html->find("table",1);

      $res_tr = $res->find('tr');

     // var_dump($res_tr);

      $data_array = array();
      $res_tr = array_chunk($res_tr,2);

      //$test = array_pop($res_tr);
      //var_dump(empty($test[0]->plaintext));

      for ($i=0; $i < count($res_tr); $i++) { 
      //  var_dump($res_tr[$i]);
      //var_dump(empty($res_tr[$i][0]->plaintext));


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

      // var_dump($second_data);
      }
       //var_dump($data_array);

		

		  $html->clear();
		
    $data = compact('data_array','year');

		 return $data ;

    }
}
