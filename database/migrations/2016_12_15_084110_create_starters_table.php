<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartersTable extends Migration
{
    public function up()
    {
        Schema::create('starters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('starter_text');
            $table->string('contributor');
        });
    }
    /**
    * Reverse the migrations.
    */

    public function down()
    {
        Schema::drop('starters');
    }


}
