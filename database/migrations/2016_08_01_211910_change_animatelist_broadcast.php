<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAnimatelistBroadcast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animate_list', function (Blueprint $table) {
            //
            $table->string('broadcast_date',64)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animate_list', function (Blueprint $table) {
            //
            $table->date('broadcast_date')->change();
        });
    }
}
