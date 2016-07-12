<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('article')->delete();
        
        // TestDummy::times(20)->create('App\Post');
        foreach (range(1, 20) as $number) {
        	\App\Post::create([
        		'title' => '測試資料'.$number,
        		'description' => '測試內容',
        	]);
        }
    }
}
