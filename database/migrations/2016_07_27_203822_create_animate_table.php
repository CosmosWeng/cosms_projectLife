<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animate_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key_year',8);
            $table->string('key_mon',8);
            $table->string('name_tw');
            $table->string('name_jp');
            $table->text('image');
            $table->text('description');
            $table->text('pt_list');
            $table->text('cv_list');
            
            $table->date('broadcast_date');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('animate_list');
    }
}
