<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectStartersAndTwines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('twines', function (Blueprint $table) {

             # Add a new INT field called `starter_id` that has to be unsigned (i.e. positive)
             $table->integer('starter_id')->unsigned();

             # This field `starter_id` is a foreign key that connects to the `id` field in the `starters` table
             $table->foreign('starter_id')->references('id')->on('starters');

         });
     }

     public function down()
     {
         Schema::table('twines', function (Blueprint $table) {

             # ref: http://laravel.com/docs/migrations#dropping-indexes
             # combine tablename + fk field name + the word "foreign"
             $table->dropForeign('twines_starter_id_foreign');

             $table->dropColumn('starter_id');
         });
     }

}
