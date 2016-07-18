<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

use App\Post as Post;

class MessageTableSeeder extends Seeder
{
    public function run()
    {
        //DB::table('message')->delete();
        
        // TestDummy::times(20)->create('App\Post');

		$posts =  Post::select('id')->get();
		$postArray = array();
		foreach ($posts as $key => $value) {
			//var_dump($key .":". $value);
			$postArray[$key]=$value['id'];		
		}
		

        foreach (range(1, 20) as $number) {
        	\App\Message::create([
        		'caid' => $postArray[$number-1],
        		'type' => '1',
        		'name' => '測試內容',
        		'description' => '測試內容',
        		'status' => '1',
        	]);
        }
    }
}
