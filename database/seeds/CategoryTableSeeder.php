<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
// use Laracasts\TestDummy\Factory as TestDummy;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('category')->delete();
        
        // TestDummy::times(20)->create('App\Post');
        foreach (range(1, 5) as $number) {
        	\App\Category::create([
        		'name' => '測試類別'.$number
        	]);
        }
    }
}
