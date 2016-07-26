<?php

namespace App\Http\Controllers\Animate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;


include(ROOT_PATH . 'app/Libraries/simple_html_dom.php');

class AnimatelessionController extends Controller
{
    //
    public function index()
    {
    	return View('animate.class.lession');
    }

     public function analysis(Request $request)
    {
    	
    	//$html = file_get_html('http://www.animen.com.tw/NewsArea/NewsItemDetail?NewsId=15445&categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8&realCategoryId=1&subCategoryId=5');
      //$html = file_get_html('http://www.animen.com.tw/NewsArea/NewsItemDetail?NewsId=14444&categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8&realCategoryId=1&subCategoryId=5');
      $html = file_get_html('http://www.animen.com.tw/NewsArea/NewsItemDetail?NewsId=15697&categoryId=600&tagName=%E6%96%B0%E7%95%AA%E5%88%97%E8%A1%A8&realCategoryId=1&subCategoryId=5');
      

/*
      if ($request->input('html')){
        $url = $request->input('html');
       // var_dump($url);
        if (strpos($url,'www.animen.com.tw')) {
          $html = file_get_html($url);
        }
      }
*/
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
		
		  
      $data = compact('text','data_array');
    	return View('animate.class.analysis',$data);
    }
}
