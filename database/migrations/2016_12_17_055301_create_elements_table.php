<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
 {
     Schema::create('elements', function (Blueprint $table) {
         $table->increments('id');
         $table->timestamps();
         $table->string('name');
     });
 }


    /**
     * Reverse the migrations.
     */
     public function down()
     {
         Schema::drop('elements');
     }
}
