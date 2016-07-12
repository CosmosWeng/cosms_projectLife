<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class {{class}} extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        foreach (range(1, 20) as $number) {
        	\App\Product::create([
        		'model' => '測試資料'.$number,
        		'date_added' => date('Y-m-d H:i:s'),
        	]);
        }
    }
}
