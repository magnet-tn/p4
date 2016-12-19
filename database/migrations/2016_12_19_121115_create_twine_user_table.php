<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwineUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
 {
     Schema::create('twine_user', function (Blueprint $table) {

         $table->increments('id');
         $table->timestamps();

         # `twine_id` and `user_id` will be foreign keys (i.e., unsigned).
         # `twine_id` : `twines table` and `user_id` : `users` table.
         $table->integer('twine_id')->unsigned();
         $table->integer('user_id')->unsigned();

         # Make foreign keys
         $table->foreign('twine_id')->references('id')->on('twines');
         $table->foreign('user_id')->references('id')->on('users');
     });
 }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::drop('twine_user');
     }
}
